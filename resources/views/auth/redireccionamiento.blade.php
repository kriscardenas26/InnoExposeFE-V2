<!DOCTYPE html>
<html>
<head>
<title>Asignación de Rol</title>
<style>
  /* Center the div */
  body{
    background: linear-gradient(351deg, rgba(0,57,79,1) 0%, rgba(40,164,167,1) 46%, rgba(0,57,79,1) 100%);
    background-size: cover;
  }
  h1,h2,h3,h4,h5,h6{
    font-family: "Handlee", cursive;
    color: #6c757d;


  }
  p{
    font-family: "Nunito", sans-serif;
  }
  #container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
  }
  /* Position the image and text */
 #container img{
  margin-top:2rem; 
 }
  
  #overlay {
    position: relative;
    z-index: 1;
    text-align: center;
    
  }
  /* Style the close button */
  #close-btn {
    padding: 10px;
    font-size: 20px;
    color: white;
    margin-top: 1rem;
    margin-bottom:2rem;
    box-shadow: 0 2px 6px #95effd;
    background-color: #17a2b8;
    border-color: #17a2b8;
  }

  .card {
  width: 40%;
  position: relative;
  display: flex;
  flex-direction: column;
  min-width: 0;
  word-wrap: break-word;
  background-color: #fff;
  border: 1px solid rgba(0, 0, 0, 0.125);

}


</style>
</head>
<body>
  <div id="container">
  
  
        <div class="card ">
          
          <div id="overlay">
            <img  src="../img/Logo Icono.svg" width="90" height="90" alt="" srcset="">
            <h1 >¡Gracias por registrarte en InnoExpose!</h1>
            <p  style="
            color: #6c757d;
            margin:2rem; 
            ">
            
            
            Estamos revisando tu cuenta para garantizar la mejor experiencia posible. Por favor, ten un poco de paciencia mientras nuestros administradores procesan tu solicitud.¡Gracias por tu comprensión!</p>
            <button id="close-btn" onclick="event.preventDefault(); localStorage.clear();  document.getElementById('logout-form').submit();">Volver al inicio</button>
                
            <form id="logout-form" action="{{ url('/logout') }}" method="POST" class="d-none">
              {{ csrf_field() }}
            </form>
        
          </div>  
        </div>
    
  </div>
</body>
</html>