
<div ng-controller="productController">
    <form id='productForm' name="productForm" action="ajax.html">
        <div class="productcontainer">
            <h1 class="chkh1">Выберите продукт</h1>

            <div class="divredline"></div>
            <div
                class="<?php if ((isset($_SESSION['cart'])) and ($_SESSION['cart']['pocket'] == 1)) echo 'active'; ?> prodpocket click"
                pocket=1>
                <div class="prodplantitle">Базовый Пакет</div>
                <div class="prdplanprice"><strong data-new-link="true">
                        <?php echo $this->insurance->TV['сurrency']; ?>
                        <?php echo $this->insurance->TV['price_1']; ?></strong> / месяц
                </div>
                <div class="prodplanlist">
                    <div class="w-clearfix plalistitem">
                        <div class="listitemr"></div>
                        <div class="plisttext">Loreum epsum text</div>
                    </div>
                    <div class="w-clearfix plalistitem">
                        <div class="listitemr"></div>
                        <div class="plisttext">Loreum epsum text</div>
                    </div>
                    <div class="w-clearfix plalistitem">
                        <div class="listitemr"></div>
                        <div class="plisttext">Loreum epsum text</div>
                    </div>
                    <div class="w-clearfix plalistitem">
                        <div class="listitemr"></div>
                        <div class="plisttext">Loreum epsum text</div>
                    </div>
                </div>
            </div>
            <div
                class="<?php if ((isset($_SESSION['cart'])) and ($_SESSION['cart']['pocket'] == 2)) echo 'active'; ?> prodpocket click"
                pocket=2>
                <div class="prodplantitle">Стандарт Пакет</div>
                <div class="prdplanprice"><strong data-new-link="true"><?php echo $this->insurance->TV['сurrency']; ?>
                        <?php echo $this->insurance->TV['price_2']; ?></strong> / месяц
                </div>
                <div class="prodplanlist">
                    <div class="w-clearfix plalistitem">
                        <div class="listitemr"></div>
                        <div class="plisttext">Loreum epsum text</div>
                    </div>
                    <div class="w-clearfix plalistitem">
                        <div class="listitemr"></div>
                        <div class="plisttext">Loreum epsum text</div>
                    </div>
                    <div class="w-clearfix plalistitem">
                        <div class="listitemr"></div>
                        <div class="plisttext">Loreum epsum text</div>
                    </div>
                    <div class="w-clearfix plalistitem">
                        <div class="listitemr"></div>
                        <div class="plisttext">Loreum epsum text</div>
                    </div>
                </div>
            </div>
            <div class="<?php if ((isset($_SESSION['cart'])) and ($_SESSION['cart']['pocket'] == 3)) echo 'active'; ?>
    premium prodpocket click" pocket=3>
                <div class="prodplantitle">Премиум Пакет</div>
                <div class="prdplanprice"><strong data-new-link="true"><?php echo $this->insurance->TV['сurrency']; ?>
                        <?php echo $this->insurance->TV['price_3']; ?></strong> / месяц
                </div>
                <div class="prodplanlist">
                    <div class="w-clearfix plalistitem">
                        <div class="listitemr"></div>
                        <div class="plisttext">Loreum epsum text</div>
                    </div>
                    <div class="w-clearfix plalistitem">
                        <div class="listitemr"></div>
                        <div class="plisttext">Loreum epsum text</div>
                    </div>
                    <div class="w-clearfix plalistitem">
                        <div class="listitemr"></div>
                        <div class="plisttext">Loreum epsum text</div>
                    </div>
                    <div class="w-clearfix plalistitem">
                        <div class="listitemr"></div>
                        <div class="plisttext">Loreum epsum text</div>
                    </div>
                </div>
            </div>
            <div class='cart_div' <?php
            if ($this->IsCartEmpty()) echo 'style="display:none;"'; ?>>
                <div class="prodstoimostcontainer card" pocket=1>
                    <?php
                    if (!$this->IsCartEmpty()) $cart = $_SESSION['cart'];
                    $this->tplCard($cart); ?>
                </div>
                <input id="Promo"
                       onchange="John.ChangeInput();"
                       type="text" placeholder="PROMO КОД" name="Promo" data-name="Promo" class="w-input promoinput">
            </div>

        </div>


        <input name="action" id="action" value="AddInsured" type="hidden">
        <input name="pocket" id="pocket"
               value="<?php if ((isset($_SESSION['cart']))) echo $_SESSION['cart']['pocket']; ?>" type="hidden">
        <input name="ins_count" id="ins_count"
               value="<?php if (isset($_SESSION['cart']['ins_count'])) echo $_SESSION['cart']['ins_count']; else echo '1'; ?>"
               type="hidden">

        <div class="pordform" id="prodpocket" style="<?php if (isset($_SESSION['cart'])) echo 'display:block;' ?>">
            <div class="w-form">

                <div class="w-clearfix promoinputbloc">

                    <div class="promolinw"></div>
                </div>
                <div class="w-clearfix formstrstr">
                    <div class="strone">1</div>
                    <div class="strtitle1 s1">Застрахованный</div>
                </div>

                <div class="insurBox" count="1">

                    <?php
                    /*todo роверка на кол-во insur*/
                    if (isset($_SESSION['cart']['ins_count'])) {
                        for ($i = 1; $i <= ($_SESSION['cart']['ins_count'] + 0); $i++) {
                            if (isset($_SESSION['cart']['ins_FIO_' . $i])) {
                                ?>
                                <div class="strinputf1">

                                    <input onchange="John.ChangeInput();"
                                           ng-model="ins_FIO_<?php echo $i; ?>"
                                           ng-minlength="3"
                                           ng-maxlength="20"
                                           required
                                           type="text" placeholder="ФАМИЛИЯ..."
                                           name="ins_FIO_<?php echo $i; ?>"
                                           value="<?php if (isset($_SESSION['cart']['ins_FIO_' . $i])) echo $_SESSION['cart']['ins_FIO_' . $i]; ?>"
                                           class="w-input strinputf">

                                    <input type="text" onchange="John.ChangeInput();"
                                           placeholder="ИМЯ..."
                                           ng-model="ins_name_<?php echo $i; ?>"
                                           ng-minlength="5"
                                           ng-maxlength="20"
                                           required
                                           name="ins_name_<?php echo $i; ?>"
                                           value="<?php if (isset($_SESSION['cart']['ins_name_' . $i])) echo $_SESSION['cart']['ins_name_' . $i]; ?>"
                                           class="w-input strinputf">

                                    <input onchange="John.ChangeInput();"
                                           ng-model="ins_lastname_<?php echo $i; ?>"
                                           ng-minlength="5"
                                           ng-maxlength="20"
                                           required
                                           type="text" placeholder="ОТЧЕСТВО.."
                                           name="ins_lastname_<?php echo $i; ?>"
                                           value="<?php if (isset($_SESSION['cart']['ins_lastname_' . $i])) echo $_SESSION['cart']['ins_lastname_' . $i]; ?>"
                                           class="w-input strinputf">

                                    <input onchange="John.ChangeInput();"
                                           type="text"
                                           ng-model="ins_birthday_<?php echo $i; ?>"
                                           ng-minlength="5"
                                           ng-maxlength="20"
                                           required
                                           placeholder="ДАТА РОЖДЕНИЯ..."
                                           name="ins_birthday_<?php echo $i; ?>"
                                           value="<?php if (isset($_SESSION['cart']['ins_birthday_' . $i])) echo $_SESSION['cart']['ins_birthday_' . $i]; ?>"
                                           class="w-input strinputf date_picker">
                                </div>
                                <?php
                            }
                        }
                    } else {
                        ?>
                        <div class="strinputf1">

                            <input onchange="John.ChangeInput();"
                                   type="text" placeholder="ФАМИЛИЯ..."
                                   ng-model="ins_FIO_1"
                                   ng-minlength="5"
                                   ng-maxlength="20"
                                   required

                                   name="ins_FIO_1"
                                   value=""
                                   class="w-input strinputf">



                            <input type="text" onchange="John.ChangeInput();"
                                   placeholder="ИМЯ..."
                                   ng-model="ins_name_1"
                                   ng-minlength="5"
                                   ng-maxlength="20"
                                   required
                                   name="ins_name_1"
                                   value=""
                                   class="w-input strinputf">

                            <input onchange="John.ChangeInput();"
                                   type="text" placeholder="ОТЧЕСТВО.."
                                   ng-model="ins_lastname_1"
                                   ng-minlength="5"
                                   ng-maxlength="20"
                                   required
                                   name="ins_lastname_1"
                                   value=""
                                   class="w-input strinputf">

                            <input onchange="John.ChangeInput();"
                                   type="text"
                                   ng-model="ins_birthday_1"
                                   ng-minlength="10"
                                   ng-maxlength="20"
                                   required
                                   placeholder="ДАТА РОЖДЕНИЯ..."
                                   name="ins_birthday_1"
                                   value=""
                                   class="w-input strinputf date_picker">
                        </div>
                        <?php
                    }
                    ?>
                </div>
                <div class="w-clearfix straddbox">
                    <div class='click'
                         onclick='John.AddInsured()'>
                        <div class="strbuttonadd">+</div>
                        <div class="straddtextbutton s1">Добавить застрахованного</div>
                    </div>

                    <div class="straddfamalybox">
                        Добавьте родственников или <br>и
                        <a tabindex="0" class="btn btn-lg btn-danger famlspan" role="button"
                           data-placement="bottom"
                           data-toggle="popover" data-trigger="focus" title="Как получить скидку?"
                           data-content="Вы можете получить скидку за каждого ...">получите скидку</a>
                    </div>
                </div>


                <div class="w-clearfix formstrstr p2">
                    <div class="strone s2">2</div>
                    <div class="strtitle1">На чье имя оформляется полис</div>
                </div>
                <div class="struserbox" ng-model="u_lastname">
                    <div class="w-clearfix sruserboxtop">
                        <div class="srusertoptext"></div>
                        <span onclick='John.ShowList()' class="strusserdownarrow click">▼</span>
                    </div>
                    <div id="tplInsurer" class="strAddHidden"><?php echo $this->tplInsurer(); ?></div>

                    <div class="w-clearfix struseradddiv click strAddHidden">
                        <div class="strbuttonadd ">+</div>
                        <div class="straddtextbutton s44 strAddHidden strUserAddButton" onclick="John.AnoverPerson();">
                            Другое лицо
                        </div>
                    </div>
                </div>


                <div class="strinputf1 AnoverPerson">
                    <input id="u_lastname" type="text" placeholder="ФАМИЛИЯ..."

                           ng-minlength="3"
                           ng-maxlength="20"
                           value="<?php if (isset($_SESSION['cart']['u_lastname'])) echo $_SESSION['cart']['u_lastname']; ?>"
                           name="u_lastname" class="w-input strinputf user">


                    <input id="u_name" type="text" placeholder="ИМЯ..."
                           name="u_name"
                           value="<?php if (isset($_SESSION['cart']['u_name'])) echo $_SESSION['cart']['u_name']; ?>"
                           data-name="U Name 2" class="w-input strinputf user">

                    <input id="u_surname" type="text"

                           placeholder="ОТЧЕСТВО.."
                           name="u_surname"
                           value="<?php if (isset($_SESSION['cart']['u_surname'])) echo $_SESSION['cart']['u_surname']; ?>"
                           class="w-input strinputf user">

                    <input id="u_birthday" type="text"

                           placeholder="ДАТА РОЖДЕНИЯ..."
                           name="u_birthday"
                           value="<?php if (isset($_SESSION['cart']['u_birthday'])) echo $_SESSION['cart']['u_birthday']; ?>"
                           class="w-input strinputf date_picker user">
                </div>

                <div class="w-clearfix straddbox" style="display: none;">
                    <div class='click' onclick='John.AddU()'>

                        <div class="strbuttonadd">+</div>
                        <div class="straddtextbutton s1">Добавить</div>
                    </div>
                </div>

                <div class="regaddressform">
                    <div class="w-clearfix formstrstr">
                        <div class="strone">3</div>
                        <div class="strtitle1">Адрес регистрации</div>
                    </div>
                    <div class="regfromaddresinputbox">
                        <input id="reg_sity" type="text" placeholder="Город..."

                               ng-model="reg_sity"
                               ng-minlength="5"
                               ng-maxlength="20"
                               required
                               name="reg_sity"
                               value="<?php if (isset($_SESSION['cart']['reg_sity'])) echo $_SESSION['cart']['reg_sity']; ?>"
                               class="w-input strinputf">




                        <input id="reg_street" type="text"
                               ng-model="reg_street"
                               ng-minlength="5"
                               ng-maxlength="20"
                               required
                               placeholder="Улица..."
                               name="reg_street"
                               value="<?php if (isset($_SESSION['cart']['reg_street'])) echo $_SESSION['cart']['reg_street']; ?>"
                               class="w-input strinputf">

                        <input id="reg_house" type="text" placeholder="Дом..."
                               ng-model="reg_house"
                               ng-minlength="1"
                               ng-maxlength="20"
                               required
                               name="reg_house"
                               value="<?php if (isset($_SESSION['cart']['reg_house'])) echo $_SESSION['cart']['reg_house']; ?>"
                               class="w-input strinputf">

                        <input id="reg_kv" type="text"
                               ng-model="reg_kv"
                               ng-minlength="1"
                               ng-maxlength="20"
                               required
                               placeholder="Квартира..." name="reg_kv"
                               class="w-input strinputf">


                        <input id="reg_phone" type="text"
                               ng-model="reg_phone"

                               required
                               placeholder="Телефон..."
                               name="reg_phone"
                               value="<?php if (isset($_SESSION['cart']['reg_phone'])) echo $_SESSION['cart']['reg_phone']; ?>"
                               required="required"
                               data-name="reg_phone" class="w-input strinputf phone">

                        <input id="reg_email"
                               ng-model="reg_email"
                               ng-minlength="1"
                               ng-maxlength="20"
                               required
                               type="email"
                               placeholder="e-mail..."
                               name="reg_email"
                               value="<?php if (isset($_SESSION['cart']['reg_email'])) echo $_SESSION['cart']['reg_email']; ?>"

                               class="w-input strinputf">
                    </div>
                    <!--- <div class="regbuttonnf click" onclick="John.NextStep();">Далее</div> -->
                     <input data-loading-text="Подождите..."
                           id="NextStep"  ng-click="save(answer, productForm)"
                           type="submit" class="regbuttonnf click" value="Далее"/>

                </div>


            </div>
        </div>
    </form>
</div>


<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.11/angular.min.js"></script>
<script src="/js/app.js"></script>
<script src="/js/controllers/productFormController.js"></script>

