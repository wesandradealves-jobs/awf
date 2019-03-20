<?php get_header(); ?>
<?php 
    $query_args = array(
        'post_type' => 'page',
        'posts_per_page' => -1,
        'order' => 'ASC'
    );
    $query = new WP_Query( $query_args );
    
    if($query) :
        while ( $query->have_posts() ) : 
            $query->the_post();
?>
    <section id="<?php echo $post->post_name ?>" class="section-<?php echo $post->post_name ?> <?php  echo ($post->post_name != 'projetos') ? 'section-padding' : ''; ?>  section-meta onepage-section">
        <div class="container <?php echo ($post->post_name == 'projetos') ? 'g-layout-full-width' : ''; ?>">
            <div class="section-title-area">
                <h2 class="section-title"><?php the_title(); ?></h2>
                <div class="section-desc">
                    <?php the_excerpt(); ?>
                </div>
            </div>
            <?php 
                switch ($post->post_name) {
                    case 'empresa': ?>
                        <div class="row">
                            <div class="col-lg-12 wow slideInUp">
                                <?php if(get_theme_mod('imagem')) : ?>
                                    <div class="about-image"><img src="<?php echo get_theme_mod('imagem'); ?>" class="attachment-onepress-medium size-onepress-medium wp-post-image" alt="<?php echo get_theme_mod('titulo'); ?>" srcset="<?php echo get_theme_mod('imagem'); ?> 640w, <?php echo get_theme_mod('imagem'); ?> 300w" sizes="(max-width: 640px) 100vw, 640px"></div>
                                <?php endif; ?>
                                <h3><?php echo get_theme_mod('titulo'); ?></h3>
                                <p><?php echo get_theme_mod('texto'); ?></p>
                            </div>
                        </div>
                        <?php
                        break;
                    case 'servicos': ?>
                        <div class="row">
							<?php 
							    $args = array(
							        'post_type' => $post->post_name,
							        'posts_per_page' => -1,
							        'order' => 'ASC'
							    );
							    $loop = new WP_Query( $args );
							    
							    if($loop) :
							        while ( $loop->have_posts() ) : 
							            $loop->the_post();
							?>
                            <div class="col-sm-6 col-lg-6 wow slideInUp">
                                <div class="service-item ">
                                    <div class="service-image"><img width="150" src="<?php the_field('icone'); ?>" alt="<?php echo get_the_title(); ?>"></div>
                                    <div class="service-content">
                                        <h4 class="service-title"><?php the_title(); ?></h4>
                                        <?php the_excerpt(); ?>
                                    </div>
                                </div>
                            </div>
							<?php
							        endwhile;
							    endif;
							    wp_reset_query();
							    wp_reset_postdata();
							?>
                        </div>
                        <?php
                        break;
                    case 'projetos': ?>
                        <div class="gallery-content">
                            <div data-col="5" class="g-zoom-in gallery-masonry  enable-lightbox  gallery-grid g-col-5">
							<?php 
							    $args = array(
							        'post_type' => $post->post_name,
							        'posts_per_page' => -1,
							        'order' => 'ASC'
							    );
							    $loop = new WP_Query( $args );
							    
							    if($loop) :
							        while ( $loop->have_posts() ) : 
							            $loop->the_post();
							?>
                                <a href="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'full'); ?>" class="g-item" title="<?php echo get_the_title(); ?>"><span class="inner"><span class="inner-content"><img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id($post->ID), 'full'); ?>" alt="<?php echo get_the_title(); ?>"></span></span></a>
							<?php
							        endwhile;
							    endif;
							    wp_reset_query();
							    wp_reset_postdata();
							?>
                            </div>
                        </div>
                        <?php
                        break;    
                    case 'contato': ?>
                        <div class="row">
                            <div class="contact-form col-sm-6 wow slideInUp">
                                <div class="wpforms-container wpforms-container-full" id="wpforms-1431">
                                    <form id="wpforms-form-1431" class="wpforms-validate wpforms-form" data-formid="1431" method="post" enctype="multipart/form-data"  action="<?php echo site_url('PHPMailer/send.php') ?>">
                                        <div class="wpforms-field-container">
                                            <div id="wpforms-1431-field_0-container" class="wpforms-field wpforms-field-name" data-field-id="0">
                                                <label class="wpforms-field-label" for="wpforms-1431-field_0">Nome <span class="wpforms-required-label">*</span></label>
                                                <div class="wpforms-field-row wpforms-field-medium">
                                                    <div class="wpforms-field-row-block wpforms-first">
                                                        <input type="text" id="wpforms-1431-field_0" class="wpforms-field-name-first wpforms-field-required" name="contato[nome]" required="required">
                                                    </div>
                                                </div>
                                            </div>
                                            <div id="wpforms-1431-field_1-container" class="wpforms-field wpforms-field-email" data-field-id="1">
                                                <label class="wpforms-field-label" for="wpforms-1431-field_1">Email <span class="wpforms-required-label">*</span></label>
                                                <input type="email" id="wpforms-1431-field_1" class="wpforms-field-medium wpforms-field-required" name="contato[email]" required="required">
                                            </div>
                                            <div id="wpforms-1431-field_2-container" class="wpforms-field wpforms-field-textarea" data-field-id="2">
                                                <label class="wpforms-field-label" for="wpforms-1431-field_2">Mensagem <span class="wpforms-required-label">*</span></label>
                                                <textarea id="wpforms-1431-field_2" class="wpforms-field-medium wpforms-field-required" name="contato[mensagem]" required="required"></textarea>
                                            </div>
                                        </div>
                                        <div class="wpforms-submit-container">
                                            <button type="submit" class="wpforms-submit " id="wpforms-submit-1431" value="wpforms-submit" data-alt-text="Enviando...">Enviar</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-sm-6 wow slideInUp">
                                <?php if(get_theme_mod('texto')) : ?>
                                <p><?php echo get_theme_mod('texto'); ?></p>
                                <?php endif; ?>
                                <?php if(get_theme_mod('texto')||get_theme_mod('telefone')||get_theme_mod('email')||get_theme_mod('endereco')) : ?>
                                <div class="address-box">
                                    <h3>Endereço</h3>
                                    <?php if(get_theme_mod('endereco')) : ?>
                                    <div class="address-contact"> <span class="fa-stack"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-map-marker fa-stack-1x fa-inverse"></i></span>
                                        <div class="address-content"><?php echo get_theme_mod('endereco'); ?></div>
                                    </div>
                                    <?php endif; ?>
                                    <?php if(get_theme_mod('telefone')) : ?>
                                    <div class="address-contact"> <span class="fa-stack"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-phone fa-stack-1x fa-inverse"></i></span>
                                        <div class="address-content"><?php echo get_theme_mod('telefone'); ?></div>
                                    </div>
                                    <?php endif; ?>
                                    <?php if(get_theme_mod('email')) : ?>
                                    <div class="address-contact"> <span class="fa-stack"><i class="fa fa-circle fa-stack-2x"></i><i class="fa fa-envelope fa-stack-1x fa-inverse"></i></span>
                                        <div class="address-content"><a href="mailto:<?php echo get_theme_mod('email'); ?>"><?php echo get_theme_mod('email'); ?></a></div>
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>                    
                    <?php
                        break;            
                    default:
                        // code...
                        break;
                }
            ?>
        </div>
    </section>
<?php
        endwhile;
    endif;
    wp_reset_query();
    wp_reset_postdata();
?>
<?php get_footer(); ?>