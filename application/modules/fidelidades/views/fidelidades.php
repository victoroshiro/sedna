<!-- Main -->
<main class="main blog" role="main">
	<div class="content static">
                <div class="wrap">
                    <!-- ThreeFourth -->
                    <div class="three-fourth">
                        <div class="entry-content">
                            <div class="row bg-white">
                                <div class="fidelidades">
                                    <div class="wysiwyg-content">
                                        <?php echo $fidelidade_texto->descricao ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row bg-white margin-top-lg">
                                <div class="fidelidades">
                                    <!-- Item -->
                                    <?php foreach ($fidelidades as $key => $item): ?>
                                    <article class="one-third hentry">
                                        <figure><a href="<?php echo site_url('fidelidade/detalhe/'.$item->slug); ?>"><img src="<?php echo site_url('userfiles/fidelidades/'.$item->imagem); ?>" alt="<?php echo $item->titulo; ?>" /></a></figure>
                                    </article>
                                    <?php endforeach ?>
                                    <!-- //Item -->
                                </div>

                                <div class="pager2 full-width">
                                    <?php echo $links ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- //ThreeFourth -->

                    <!-- OneFourth -->
                    <aside class="one-fourth sidebar sidebar-right">	
                            <div class="widget">
                                    <h3>Curta nossa Fanpage</h3>
                                    <div id="fb-root"></div>
                                    <script>(function(d, s, id) {
                                      var js, fjs = d.getElementsByTagName(s)[0];
                                      if (d.getElementById(id)) return;
                                      js = d.createElement(s); js.id = id;
                                      js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10";
                                      fjs.parentNode.insertBefore(js, fjs);
                                    }(document, 'script', 'facebook-jssdk'));</script>

                                    <div class="fb-page" data-href="https://www.facebook.com/pg/SednaYachts.br/" data-tabs="timeline" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/pg/SednaYachts.br/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/pg/SednaYachts.br/">Facebook</a></blockquote></div>
                            </div>
                    </aside>
                    <!-- //OneFourth -->
                </div>
	</div>
</main>
