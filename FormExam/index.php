<?php
require_once 'Layout/layout.php';
require_once 'Ayuda/utilities.php';
require_once 'formTransaccion/persona.php';
require_once 'service/IServiceBase.php';
require_once 'formTransaccion/PersonServiceCookies.php';

$layout = new layout(false);
$service = new PersonServiceCookies();
$utilities = new Utilities();

$listPerson = $service->GetList();

?>

<?php $layout->printHeader();?>

<main role="main">

  <section class="jumbotron text-center">
    <div class="container">
      <h1>Procesador de transacciones</h1>
      <p class="lead text-muted">Este CRUD de transaccione spuede eliminar, editar y Guardar. </p>
      <p>
        <a href="formTransaccion/add.php" class="btn btn-primary my-2">Nueva transaccion</a>

      </p>
    </div>
  </section>

  <div class="album py-5 bg-light">
    <div class="container">

      <div class="row">

        <?php if (empty($listPerson)): ?>

        <h2>No hay transacciones por el momento, realize una aqui: <a href="formTransaccion\add.php"
            class="btn btn-primary">
            Nueva transaccion</a></h2>

        <?php else: ?>

        <?php foreach ($listPerson as $person): ?>

        <div class="col-md-4">
          <div class="card" style="width: 18rem;">
            <div class="card-body">
              <h5 class="card-title">Transaccion #: <?php echo $person->id; ?></h5>
              <h6 class="card-subtitle mb-2 text-muted">Fecha y Hora: <?php echo $person->fecha_hora; ?></h6>
              <p class="card-text">Monto: <?php echo $person->monto; ?> </p>
              <p class="card-text">Descripcion: <?php echo $person->descripcion; ?> </p>
              <a href="formTransaccion\editar.php?id=<?php echo $person->id; ?>" class="card-link">Editar</a>
              <a href="formTransaccion\borrar.php?id=<?php echo $person->id; ?>" class="card-link">Borrar</a>
            </div>
          </div>
        </div>

        <?php endforeach;?>



        <?php endif?>




      </div>
    </div>
  </div>

</main>
<?php $layout->printFooter();?>