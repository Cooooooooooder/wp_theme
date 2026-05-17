  <?php 
  get_header();
  ?>
  
  <div class="page-title">
      <div class="container">
          <div class="row">
              <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                  <h2><?php echo get_the_title(); ?></h2>
              </div><!-- end col -->
              <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="#">Home</a></li>
                      <li class="breadcrumb-item"><a href="#">Pages</a></li>
                      <li class="breadcrumb-item active">Fullwidth</li>
                  </ol>
              </div><!-- end col -->
          </div><!-- end row -->
      </div><!-- end container -->
  </div><!-- end page-title -->


  <section class="section">
      <div class="container">
          <div class="row">
              <div class="col-lg-12">
                  <div class="page-wrapper">
                    <?php the_content(); ?>
                  </div><!-- end page-wrapper -->
              </div><!-- end col -->
          </div><!-- end row -->
      </div><!-- end container -->
  </section>

    <?php 
  get_footer();
  ?>