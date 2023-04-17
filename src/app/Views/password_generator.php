<?php
include '../app/includes/header.php';

echo $pageDescription; ?>

    <script>
        // Generate a random number
        function makeRand(max) {
            return Math.floor(Math.random() * max);
        }

        // Generate a password
        function makePassword(form) {
            var vowels =
                "ai ay au aw augh wa all ald alk alm alt " +
                "ee ea eu ew ei ey eigh " +
                "ie ye igh ign ind " +
                "oo oa oe oi oy old olk olt oll ost ou ow " +
                "ue ui";
            var digraphs = "Ch Ck Ff Gh Gn Kn Ll Mb Ng Nk Ph Qu Sh Ss Th Wh Wr Zz";
            var trigraphs = "chr dge tch";
            var consonants = "abcdfghjklmnpqrstvwxyz";
            var special = "!@#$%^&*()-+";
            var plaintext = "";

            var vowelArray = [];
            var digraphArray = [];
            var trigraphArray = [];

            // Put all the phonetics into individually addressable arrays
            vowelArray = vowels.split(" ");
            digraphArray = digraphs.split(" ");
            trigraphArray = trigraphs.split(" ");

            // Now construct our new password
            while (plaintext.length < form.minlength.value) {
                plaintext += digraphArray[makeRand(digraphArray.length)];
                plaintext += vowelArray[makeRand(vowelArray.length)];
                if (form.strong.checked) plaintext += special.charAt(makeRand(special.length));
            }

            form.password.value = plaintext;
        }
    </script>

<?php
$form = new Form('POST', 'my-form-preventDefault', 'inputForm', '#');
$form->input('minlength', 'Minimum Length:  ', 'text', array(
    'style' => 'width: 25px;',
    'value' => '12'));
$form->input('strong', ' Make password strong:  ', 'checkbox', array(), true);
$form->html('<br>');
$form->button('action', 'generate', 'Generate Password', array(
    'class' => 'button',
    'onClick' => 'makePassword(this.form)'));
$form->copyDownloadButton();
$form->input('password', 'Random Password:', 'text');
echo $form->render();

include '../app/includes/footer.php'; ?>