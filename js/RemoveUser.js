
    function RemoveUser(){        
        if(confirm("Este acción será irreversible.")==true){
            $.ajax({
                url: '../php/BorrarUsuario.php'                     
            });
            location.replace("Layout.php");       
        } 
                   
    }

