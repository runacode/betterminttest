<!-- Footer -->
<section id="footer">
    <div class="container">
        <header>
            <h2<?php if ($EditMode) { ?> datatype="TextBox" data-position="FooterHeaderText" <?php } ?>><?= $data->FooterHeaderText ?></h2>
        </header>
        <div class="row">
            <div class="col-6 col-12-medium">
                <section>
                    <form method="post" action="/contact-thank-you.php">
                        <div class="row gtr-50">
                            <div class="col-6 col-12-small">
                                <input name="name" <?php if ($EditMode) { ?> datatype="TextBox" data-position="ContactNamePlaceHolder" <?php } ?>
                                       placeholder="<?php echo $data->ContactNamePlaceHolder ?>" type="text"/>
                            </div>
                            <div class="col-6 col-12-small">
                                <input name="email"
                                    <?php if ($EditMode) { ?> datatype="TextBox" data-position="ContactEmailPlaceHolder" <?php } ?>
                                       placeholder="<?php echo $data->ContactEmailPlaceHolder ?>" type="text"/>
                            </div>
                            <div class="col-12">
                                <textarea name="message"
                                          placeholder="<?php echo $data->ContactMessageBoxPlaceHolder ?>"
                                    <?php if ($EditMode) { ?> datatype="TextBox" data-position="ContactMessageBoxPlaceHolder" <?php } ?>
                                ></textarea>
                            </div>
                            <div class="col-12">
                                <button type="submit"
                                        class="form-button-submit button icon solid fa-envelope" <?php if ($EditMode) { ?>
                                    datatype="TextBox"
                                    data-position="SendMessageButtonText" <?php } ?> ><?= $data->SendMessageButtonText ?></button>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
            <div class=" col-6 col-12-medium">
                <section>
                    <p <?php if ($EditMode) { ?>
                        datatype="TextBox"
                        data-position="FooterText" <?php } ?>
                    ><?= $data->FooterText ?></p>
                    <div class="row">
                        <div class="col-6 col-12-small">
                            <ul class="icons">

                                <li class="icon solid fa-user-secret">
                                    <a href="/pages/privacy" <?php if ($EditMode) { ?>
                                        datatype="TextBox"
                                        data-position="PrivacyButtonText" <?php } ?> ><?= $data->PrivacyButtonText ?></a>
                                </li>
                                <li class=" icon solid fa-terminal">
                                    <a href="/pages/terms"
                                        <?php if ($EditMode) {
                                            ?> datatype="TextBox"
                                            data-position="TermsOfServiceButtonText"
                                            <?php
                                        } ?> >
                                        <? echo $data->TermsOfServiceButtonText ?></a>
                                </li>
                                <li class=" icon solid fa-envelope">
                                    <a href="mailto:<?php echo $data->ContactEmail ?>"><?php echo $data->ContactEmail ?></a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-6 col-12-small">

                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
    <div id="copyright" class="container">
        <ul class="links">
            <li>&copy; <?= $data->SiteTextLogo ?>. <span  <?php if ($EditMode) { ?>
                    datatype="TextBox"
                    data-position="FooterRightsText" <?php } ?>>All rights reserved.</span></li>

        </ul>
    </div>
</section>
