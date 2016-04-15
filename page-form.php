<?php get_header(); ?>

    <!-- site content -->
    <div class="site-content container">
        <!--main-column-->
        <div class="main-column">

            <form action="" class="contact-form-page">
                <div class="form-group"> Назва організації / підприємства </br>
                    <input type="text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-control" placeholder="Введіть сюди" name="organization" id="organization">
                </div>

                <div class="form-group"> Земельні площі </br>
                    <input type="text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-control" placeholder="Введіть сюди" name="area" id="area">
                </div>

                <div class="form-group"> Які культури вирощуються? </br>
                    <input type="text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-control" placeholder="Введіть сюди" name="cultures" id="cultures">
                </div>

                <div class="form-group"> Коли останній раз проводили аналіз ґрунту? </br>
                    <input type="text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-control" placeholder="Введіть сюди" name="analysis_of_land" id="analysis_of_land">
                </div>

                <div class="form-group"> Які види добрив вносяться? </br>
                    <input type="text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-control" placeholder="Введіть сюди" name="fertilization" id="fertilization">
                </div>

                <div class="form-group"> Виробникам добрив якої країни надаєте перевагу? </br>
                    <input type="text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-control" placeholder="Введіть сюди" name="favourit_countries" id="favourit_countries">
                </div>

                <div class="form-group"> Чи купували Європейські добрива? </br>
                    <input type="text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-control" placeholder="Введіть сюди" name="european_fertilizer" id="european_fertilizer">
                </div>

                <div class="form-group"> При виборі добрив для Вас вирішальне значення мають:
                    <p><input type="checkbox"  class="form-control" name="a" value="Якість"> Якість </p>
                    <p><input type="checkbox"  class="form-control" name="a" value="Ціна"> Ціна </p>
                    <p><input type="checkbox"  class="form-control" name="a" value="Інше"> Інше(вказати) </p>
                    <textarea class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-control" rows="4" cols="50"></textarea>
                </div>

                <div class="form-group"> Контактный телефон </br>
                    <input type="text" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-control" placeholder="Введіть сюди" name="contact_telephone" id="contact_telephone">
                </div>

                <div class="form-group"> E-mail </br>
                    <input type="email" class="col-xs-12 col-sm-12 col-md-12 col-lg-12 form-control" placeholder="Введіть сюди" name="contact_email" id="contact_email">
                </div>



                <button type="submit" data-text="SUBMIT" class="button button-default" id="submit"><span> Надіслати </span></button>
            </form>

        </div>
        <!--main-column-->

        <div class="sidebar">
            <?php get_sidebar(); ?>
        </div>

    </div>
    <!--site content-->


<?php get_footer(); ?>