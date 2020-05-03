<html>
<head>
  @yield('css')
  <style>
    body{
      font-family: sans-serif;
    }
    @page {
      margin: 160px 50px;
    }
    header { 
      position: fixed;
      left: 0px;
      top: -160px;
      right: 0px;
      height: 100px;
      background-color: ;
      text-align: center;
    }
    header h1{
      margin: 10px 0;
    }
    header h2{
      margin: 0 0 10px 0;
    }
    footer {
      position: fixed;
      left: 0px;
      bottom: -50px;
      right: 0px;
      height: 40px;
      border-bottom: 2px solid #ddd;
    }
    footer .page:after {
      content: counter(page);
    }
    footer table {
      width: 100%;
    }
    footer p {
      text-align: right;
    }
    footer .izq {
      text-align: left;
    }
    a {
    	text-decoration: none;
    	color: black;
    }

    table td {
    	padding: 5px;
    }
    th {
    	text-align: center;
    }
    .logo {
      width: 240px;
      height: 100px;
      margin-right: 250px;
      margin-top: 20px;
      position: absolute;
    }

    .text-right {
      text-align: right;
    }
  </style>
<body>

  <header>
    <p align="center">
      <?php $image_path = '/images/icon/logo.png'; ?>
      <img src="{{ public_path() . $image_path }}" class="logo" alt="GBM Hugo Chávez">
      <b style="font-size: 20px; margin-top: 20px;">
        República Bolivariana de Venezuela<br>
       </b>
      Vertical<br>
      Rif: J-40153589-5
      <p align="right">Fecha: <?php echo date('d/m/Y h:m A'); ?></p>
    </p>
  </header>
  
  <div class="content">
    @yield('content')
  </div>

  <footer>
    <table>
      <tr>
        <td>
          <p class="page">
            Dirección: Gran Base de Misiones de Paz Hugo Chávez La Victoria ubicada en La Avenida Bicentenario al lado del Peaje de la Victoria Estado Aragua (Gimnasio Vertical) Mcpio. José Félix Ribas Telf. 0244-3225116
          </p>
        </td>
      </tr>
      <tr>
        
        <td>
          <p class="page">
            Página
          </p>
        </td>
      </tr>
    </table>
  </footer>


</body>
</html>