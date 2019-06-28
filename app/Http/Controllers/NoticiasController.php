<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidacaoContato;
use App\Http\Requests\ValidacaoNoticias;
use App\Http\Requests\ValidacaoEdit;
use Illuminate\Http\Request;
use App\Model\Noticias;
use App\Model\Email;
use App\Model\Comentarios;
use App\Mail\NotificationEmail;
use App\Mail\ContactEmail;
use Illuminate\Support\Facades\Mail;
use Session;
use Auth;



class NoticiasController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noticias = Noticias::orderBy('id','desc')->paginate(3);
        return view('noticias.index')->with(['noticias'=>$noticias]);
    }

    /**
     * View para criar novas publicações
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('noticias.create');
    }

    /**
     * Método para criar as novas publicações
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store( ValidacaoNoticias $request, Noticias $noticias, Email $emails)
    {   
        $autor = auth()->user()->name;
        $id_autor = auth()->user()->id;
        date_default_timezone_set('America/Sao_Paulo');
		$data = date("d/m/Y");
        $horaUpload = date("His");
        $hora = date("H:i:s");
        $noticias->titulo = $request->titulo;
        $noticias->descricao = $request->descricao;
        $noticias->autor = $autor;
        $noticias->data = $data;
        $noticias->horario = $hora;
        $noticias->id_autor = $id_autor;
        
        $noticias->imagem = $request->image;
        if($request->hasFile('imagem') && $request->file('imagem')->isValid()){
            $nome= kebab_case($noticias->autor).$horaUpload.'.'.$request->file('imagem')->getClientOriginalExtension();
            $noticias->imagem = $request->file('imagem')->storeAs('noticias-img', $nome);
            //$request->file('imagem')->move('imagens-noticias/', kebab_case($noticias->autor).'.'.$request->file('imagem')->getClientOriginalExtension());                 
        }
        $noticias->save();
        NoticiasController::arqXml();
        Mail::to(Email::all())->queue(new NotificationEmail($noticias));
        //Noticias::create($request->all());
        Session::flash('status','Publicação publicada com sucesso');
        return redirect()->route('noticias.index');
    }

    /**
     * Visualizaar determinada publicação
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $noticia = Noticias::find($id);
        $comentarios = Comentarios::where('noticia_id', $noticia->id)->orderBy('id', 'DESC')->get();
        return view('noticias.show')->with(['noticia'=>$noticia])->with(['comentarios'=>$comentarios]);
    }

    /**
     * View para editar determinada notícia
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $noticia = Noticias::find($id);
        return view('noticias.edit')->with(['noticia'=>$noticia]);
    }

    /**
     * Método para editar a determinada publicação
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update( ValidacaoEdit $request, $id, Noticias $noticias)
    {
        $autor = auth()->user()->name;
        $id_autor = auth()->user()->id;
        $noticias = Noticias::find($id);
        date_default_timezone_set('America/Sao_Paulo');
        $data = date("d/m/Y");
        $horaUpload = date("His");
	    $hora = date("H:i:s");
        $noticias->titulo = $request->titulo;
        $noticias->descricao = $request->descricao;
        $noticias->autor = $autor;
        $noticias->data = $data;
        $noticias->horario = $hora;
        $noticias->id_autor = $id_autor;

        $noticias->imagem = $request->image;
        if($request->hasFile('imagem') && $request->file('imagem')->isValid()){
            $nome= kebab_case($noticias->autor).$horaUpload.'.'.$request->file('imagem')->getClientOriginalExtension();
            $noticias->imagem = $request->file('imagem')->storeAs('noticias-img', $nome);
            //$request->file('imagem')->move('imagens-noticias/', kebab_case($noticias->autor).'.'.$request->file('imagem')->getClientOriginalExtension());                 
        }
        $noticias->save();
        //$noticias = Noticias::find($id)->update($request->all());
        Session::flash('status','Publicação editada com sucesso');
        return redirect()->route('user.admin');
    }

    /**
     * View para confirmação da deleção de determinada publicação
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function delete($id)
    {
        $noticia = Noticias::find($id);
        return view('noticias.delete')->with(['noticia'=>$noticia]);
    }
    
    /**
     * Método para deletar a determinada publicação
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $noticia =  Noticias::find($id)->where('id',$id)->get();
        $imagem = $noticia->toArray();
        $imagem = $imagem[0]['imagem'];
        Noticias::find($id)->delete();
        \Storage::delete($imagem);
        Comentarios::where('noticia_id', $id)->delete();
        Session::flash('status','Publicação deletada com sucesso');
        return redirect()->route('user.admin');
    }

    /**
     * 
     * Método para criar aquivos XML de todas as publicações postadas
     * 
     */
    public function arqXml(){
        $xml = '<?xml version="1.0" encoding="UTF-8"?>';
        $xml.='<noticias>';
        $noticias = Noticias::all();
        foreach ($noticias as $noticia) {
            $xml.='<noticia>';
            $xml.='<id>'.$noticia->id.'</id>';
            $xml.='<titulo>'.$noticia->titulo.'</titulo>';
            $xml.='<descricao>'.$noticia->descricao.'</descricao>';
            $xml.='<imagem>'.$noticia->imagem.'</imagem>';
            $xml.='<autor>'.$noticia->autor.'</autor>';
            $xml.='<data>'.$noticia->data.'</data>';
            $xml.='<hora>'.$noticia->horario.'</hora>';
            $xml.='</noticia>';
        }
        $xml.='</noticias>';
    
        //Escreve o arquivo xml
        $fp= fopen('noticias-xml/noticias.xml','w+');
        fwrite($fp, $xml);
        fclose($fp);
        return redirect()->back();
    }

    /**
     * 
     * Método para enviar uma notificação a todos os email cadastrados
     * 
     */
    public function sendContact(ValidacaoContato $request){
        Mail::to('teste.php345@gmail.com')->send(new ContactEmail($request));
        Session::flash('status','Email enviado com sucesso');
        return redirect()->back();
    }

}
