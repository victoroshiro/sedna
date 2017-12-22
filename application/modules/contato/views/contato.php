<main class="main" role="main">
<!-- Content -->
	<!-- Intro -->
	<header class="intro">
		<div class="wrap">
			<h1>Contato</h1>
			<p>Dúvidas, informações, solicitações de orçamento e reclamações, preencha o formulário abaixo. Em breve nossa equipe comercial entrará em contato.</p>
		</div>
	</header>
	<!-- //Intro -->
	<div class="content boxed grid2">
		<!-- Item -->
		<article class="full-width hentry">
			<div class="one-half">
                            <div class="text">
                                <h4>Contato</h4>
                                <p>
                                +55 (11) 99617.6035
                                </p>
                                <p>
                                contato@cimitarra.com.br
                                </p>
                                <p>
                                Av. dos Bandeirantes, 4063
                                <br>
                                Planalto Paulista - São Paulo/SP
                                </p>

                                <form method="post" action="<?php echo site_url('contato/send'); ?>" name="contactform" id="contactform" class="contactform">
                                    <fieldset>
                                        <div id="message_result"></div>
                                        <div class="full-width">
                                            <label for="name">Nome e Sobrenome</label>
                                            <input type="text" name="name" id="name"/>
                                        </div>

                                        <div class="full-width">
                                            <label for="email">E-mail</label>
                                            <input type="email" name="email" id="email"/>
                                        </div>

                                        <div class="full-width">
                                            <label for="phone">Telefone</label>
                                            <input type="text" name="phone" id="phone"/>
                                        </div>

                                        <div class="full-width">
                                            <label for="message">Sua Mensagem</label>
                                            <textarea id="message" name="message"></textarea>
                                        </div>

                                        <div class="checkbox">
                                            <label for="opt_in">
                                                <input type="checkbox" name="opt_in" id="opt_in"> Desejo receber os informativos da Cimitarra
                                            </label>
                                        </div>

                                        <div class="full-width">
                                            <input type="submit" value="Enviar Mensagem" class="button gold large" id="submit" />
                                        </div>
                                    </fieldset>
                                </form>
                            </div>
			</div>
			<div class="one-half"><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3655.6306871698516!2d-46.66299648502114!3d-23.617574384655025!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce5a6d8838cae5%3A0x53fba56ab556aaf1!2sAv.+dos+Bandeirantes%2C+4063+-+Planalto+Paulista%2C+S%C3%A3o+Paulo+-+SP!5e0!3m2!1sen!2sbr!4v1504621483125" width="1000" height="800" frameborder="0" style="border:0"></iframe></div>
		</article>
		<!-- //Item -->
	</div>
	<!-- //Content-->
</main>
