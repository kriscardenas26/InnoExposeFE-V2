<!DOCTYPE html>
<html>
<head>
<title>Asignación de Rol</title>
<style>
  /* Center the div */
  #container {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
  }
  /* Position the image and text */
  #container img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: -1;
  }
  #overlay {
    position: relative;
    z-index: 1;
    text-align: center;
    color: white;
  }
  /* Style the close button */
  #close-btn {
    padding: 10px;
    font-size: 30px;
    background-color: white;
    color: black;
    border: none;
    cursor: pointer;
    margin-top: 20px;
  }
</style>
</head>
<body>
<div id="container">
  <!-- <img src="../../../img/una.webp" alt="Spinner"> -->
    <div id="overlay">
    <h1>Revisión de cuenta</h1>
    <p>Por favor, espere mientras un administrador autoriza su cuenta.</p>
    <button id="close-btn" onclick="event.preventDefault(); localStorage.clear();  document.getElementById('logout-form').submit();">Salir</button>
    
    <form id="logout-form" action="{{ url('/logout') }}" method="POST" class="d-none">
      {{ csrf_field() }}
    </form>
  </div>
</div>
</body>
</html>