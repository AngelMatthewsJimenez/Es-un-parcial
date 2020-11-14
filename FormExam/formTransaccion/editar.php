<?php
require_once '../Layout/layout.php';
require_once '../Ayuda/utilities.php';
require_once 'persona.php';
require_once '../service/IServiceBase.php';
require_once 'PersonServiceCookies.php';

$layout = new layout(true);
$service = new PersonServiceCookies();

if (isset($_GET['id'])) {
    $personId = $_GET['id'];

    $element = $service->GetId($personId);

    if (isset($_POST['fecha_hora']) && isset($_POST['monto']) && isset($_POST['descripcion'])) {

        $UpdatePerson = new persona();
        $UpdatePerson->inicializeData($personId, $_POST['fecha_hora'], $_POST['monto'], $_POST['descripcion']);

        $service->Update($personId, $UpdatePerson);

        header('location: ../index.php');
        exit();
    }

} else {
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
          <a href="../index.php" class="btn btn-warning">Volver atras</a> Editar la Transaccion
        </div>
        <div class="card-body">
          <form action="editar.php?id=<?php echo $element->id ?>" method="POST">
            <div class="form-group">
              <label for="fecha_hora">Fecha y Hora</label>
              <input type="Date" value="<?php echo $element->fecha_hora ?>" class="form-control" id="fecha_hora"
                name="fecha_hora">

            </div>
            <div class="form-group">
              <label for="monto">Monto</label>
              <input type="text" value="<?php echo $element->monto ?>" class="form-control" id="monto" name="monto">
            </div>
            <div class="form-group">
              <label for="descripcion">Descripcion</label>
              <input type="text" value="<?php echo $element->descripcion ?>" class="form-control" id="descripcion"
                name="descripcion">
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