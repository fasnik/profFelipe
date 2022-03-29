function create_nav(){
    
    var nav = document.createElement('nav');
    
    var button =document.createElement('button');
    button.setAttribute('class',"btn btn-primary");
    button.setAttribute('onclick',"location.href='index.html'");
    button.innerText = "Página Inicial";
    nav.appendChild(button);
    document.body.appendChild(nav);
}


function create_header(){
    
    var header =document.createElement('header');
    header.setAttribute('aria-label', 'Professor Felipe Foto');
    
    var main =document.createElement('main');
    main.setAttribute('role',"main") ;
    main.setAttribute('aria-label',"Conteúdos: Navegue pelas tabelas usando a tecla t") ;
    main.setAttribute('id','conteudo');
    main.setAttribute('class','container');
    document.body.appendChild(header);
    document.body.appendChild(main);
}

function create_footer(){

    var footer = document.createElement('footer');
    var footerText = document.createElement('p');
    footerText.innerText = 'Desenvolvido por Felipe Augusto - 2019';
    document.body.appendChild(footer);
    footer.appendChild(footerText);
}


function table_contents(table_id, topic, contents){
    
    var table = document.getElementById(table_id);
    var tbody = table.getElementsByTagName('tbody')[0];

    let c = contents.length;

    for (var i =0; i <c; i++){
        
        var tr = document.createElement('tr');
        tr.setAttribute('role', 'row');
        var td_topic = document.createElement('td');
        td_topic.setAttribute('scope', 'col');
        td_topic.setAttribute('role', 'columnheader');
        td_topic.innerHTML = topic;

        var td_content = document.createElement('td');
        td_content.setAttribute('scope', 'col');
        td_content.setAttribute('role', 'columnheader');
        td_content.innerHTML = contents[i];

        tr.appendChild(td_topic);
        tr.appendChild(td_content);

        tbody.appendChild(tr);

    };

}

function fill_content(file){
	document.getElementById('conteudo').innerHTML=file;

}
 

