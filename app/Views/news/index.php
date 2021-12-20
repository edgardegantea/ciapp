<link rel="stylesheet" href="<?php echo base_url('assets/css/style.css') ?>">

<section class="py-5 text-center bg-dark text-light">
    <div class="row py-lg-5">
        <div class="col-lg-6 col-md-8 mx-auto">
            <h1 class="fw-light"><?= esc($title) ?></h1>
            <a href="/news/create" class="btn btn-primary">+ Nuevo</a>
            <a href="/" class="btn btn-secondary">Volver</a>
        </div>
    </div>
</section>


<div class="album py-5 bg-dark fondo-body">
    <div class="container">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            <?php if (!empty($news) && is_array($news)): ?>
            
            <?php foreach ($news as $new): ?>

            <div class="col"> 

                <div class="card shadow-sm">
            
                    <div class="card-body">

                        <h3 class="text-center"><?= esc($new['title']) ?></h3>

                        <div class="main">
                            <?= esc($new['body']) ?>
                        </div>


                        <span class="badge bg-dark text-light mt-3"><?= esc($new['slug']) ?> :: <?= esc($new['created_at']) ?></span>

                        <div class="mt-3">
                            <div class="btn-toolbar d-md-flex">
                                <div class="btn-group me-2 btn-group-sm" >
                                    <a class="btn btn-outline-secondary" href="/news/<?= esc($new['slug'], 'url') ?>">Ver más</a>
                                    <a class="btn btn-outline-secondary" href="#">Editar</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php endforeach; ?>

        </div>

        <?php else: ?>

        <h3>No hay noticias</h3>

        <p>Le avisaremos cuando haya nuevo material</p>

    <?php endif; ?>

    </div>
</div>