
<div class="strinputf1" id="ins_<?php echo $_GET['id'] ?>">
    <input onchange="John.ChangeInput();"
           ng-model="ins_FIO_<?php echo $_GET['id']; ?>"
           ng-minlength="5"
           ng-maxlength="10"
           type="text" placeholder="ФАМИЛИЯ..."
           name="ins_FIO_<?php echo $_GET['id'] ?>"
           class="w-input strinputf">

    <input  type="text"  onchange="John.ChangeInput();"
            placeholder="ИМЯ..."
            ng-model="ins_name_<?php echo $_GET['id']; ?>"
            ng-minlength="5"
            ng-maxlength="10"

            name="ins_name_<?php echo $_GET['id'] ?>"
            class="w-input strinputf">

    <input onchange="John.ChangeInput();"
           type="text" placeholder="ОТЧЕСТВО.."
           ng-model="ins_lastname_<?php echo $_GET['id']; ?>"
           ng-minlength="5"
           ng-maxlength="10"
           name="ins_lastname_<?php echo $_GET['id'] ?>"
           class="w-input strinputf">

    <input onchange="John.ChangeInput();"
           type="text"
           placeholder="ДАТА РОЖДЕНИЯ..."
           required
           name="ins_birthday_<?php echo $_GET['id'] ?>"
           class="w-input strinputf date_picker">

    <div class="strbuttonadd minus click" onclick="John.DeleteInsured(<?php echo $_GET['id'] ?>)" >-</div>
</div>