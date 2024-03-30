<?= $this->extend('layout/template'); ?>

<?= $this->section('content'); ?>

<div class="fotovisi">
  <div class="container">
    <div class="row">
      <div class="col">

        <?php foreach ($visimisi as $v) : ?>

          <img src="/img/visimisi/<?= $v['fotovisimisi']; ?>" class="fotovisimisi" alt="Foto Visi Misi" srcset="">

        <?php endforeach; ?>

      </div>
    </div>
  </div>
</div>

<div class="persyaratansilancar">
  <div class="container">
    <div class="row">
      <div class="col">

        <div class="accordion accordion-flush" id="accordionFlushExample" style="margin-bottom: 2%;">

          <?php $i = 1; ?>
          <?php foreach ($persyaratansilancar as $pers) : ?>

            <div class="accordion-item" style="margin-top: 1%;">
              <h2 class="accordion-header">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapse <?= $i++; ?>" style="background-color:#890B0C;">
                  <h6 class="judulsilancar text-white fw-bold"><?= $pers['judulpersyaratan']; ?></h6>
                </button>
              </h2>
              <div id="flush-collapseOne" class="accordion-collapse collapse" data-bs-parent="#accordionFlushExample">

                <div class="grid-container">
                  <div>
                    <img class="fotopersyaratan" src="/img/persyaratansilancar/<?= $pers['fotopersyaratan']; ?>" alt="" srcset="">
                  </div>
                  <div>
                    <p class="text-justify">
                      <?= $pers['keteranganpersyaratan']; ?>
                    </p>
                  </div>
                </div>

              </div>
            </div>

          <?php endforeach; ?>

        </div>

      </div>
    </div>
  </div>
</div>

<?= $this->endSection('content'); ?>