<?php
require_once '../Layout/layout.php';
require_once '../Ayuda/utilities.php';
require_once 'persona.php';
require_once '../service/IServiceBase.php';
require_once 'PersonServiceCookies.php';

$layout = new layout(true);
$service = new PersonServiceCookies();

if (isset($_POST['fecha_hora']) && isset($_POST['monto']) && isset($_POST['descripcion'])) {

    $NewPerson = new persona();
    $NewPerson->inicializeData(0, $_POST['fecha_hora'], $_POST['monto'], $_POST['descripcion']);

    $service->Add($NewPerson);

    header('location: ../index.php');
    exit();
}

?>

<?php $layout->printHeader();?>

<main role="main">
  <div style="margin-top: 2% " class="row">
    <div class="col-md-3"></div>
    <div class="col-md-6">
      <div class="card">
        <div class="card-header bg-dark text-light">
          <a href="../index.php" class="btn btn-warning">Volver atras</a> Nueva Transaccion
        </div>
        <div class="card-body">
          <form action="add.php" method="POST">
            <div class="form-group">
              <label for="fecha_hora">Fecha y Hora</label>
              <input type="Date" class="form-control" id="fecha_hora" name="fecha_hora">

            </div>
            <div class="form-group">
              <label for="monto">Monto</label>
              <input type="text" class="form-control" id="monto" name="monto">
            </div>
            <div class="form-group">
              <label for="descripcion">Descripcion</label>
              <input type="text" class="form-control" id="descripcion" name="descripcion">
            </div>

            <button type="submit" class="btn btn-success">Submit</button>
          </form>
        </div>
      </div>
    </div>
    <div class="col-md-3"></div>

  </div>



</main>
<?php $layout->printFooter();?>