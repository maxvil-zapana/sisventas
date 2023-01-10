<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>.:: Login de Usuario ::.</title>
    <script src="librerias/jquery/jquery.js"></script>
    <script src="js/funciones.js"></script>
    <link rel="stylesheet" href="css/Framework.css">
    
    
    <style>
        form {
            width: 30%; 
        }
        img{
            width: 50%;
            height: 50%;
            margin: 0 auto;
            display: block;
        }
    </style>
</head>

<body>
    <div class="contenedor">
        <div class="flexContainer">
            <form action="" id="frmLogin"> 
                <h1 class="tituloForm">LOGIN</h1>
                <div class="logo">
                    <img src="img/logo.png" alt="fotografia">
                </div>
                <label for="nombre">Usuario</label>
                <input type="text" class="input" name="usuario">
                <label for="nombre">Password</label>
                <input type="password" class="input" name="password">
                <div class="botones">
                    <button class="boton"id="entrarSistema">Entrar</button> 
                    <a href="registro.php"class="boton verde" id="registro">Registro</a>
                </div>
            </form>
        </div>

    </div>


    <div id="prueba"></div>


    <button id="boton_prueba">boton de prueba</button>
</body>

</html>

<script type="text/javascript">
    $(document).ready(function(){
        $('#entrarSistema').click(function(){

            vacios=validarFormVacio('frmLogin');
                if(vacios>0){
                    alert ("Debes llenar todos los campos");
                    return false;
                }

            datos=$('#frmLogin').serialize();
            // console.log(datos);

            $.ajax({
                type:"POST",
                data:datos,
                async:true,
                url:"procesos/regLogin/login.php",
                success:function(r){

                    if (r==1){
                        window.location="vistas/inicio.php";
                        console.log(r);

                    }else{
                        alert("no se pudo acceder");
                    }

                }
            });

        });

    });
        



    boton = document.getElementById('boton_prueba');
    boton.onclick=function(){

    info=["manzana", "Banana"]

    //creando un objeto
    var objeto={
        metodo:'Get',
        url:'procesos/reglogin/login.php',
        async:true,
        datos:info
    }
    const ajax = new Ajax(objeto)
        
    console.log(ajax.respuesta())
    



        

// document.getElementById(prueba).innerHTML=ajax.respu
        
}





</script>