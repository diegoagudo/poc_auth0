<?php

require 'init.php';
$getUser  = false;
$loginUrl = $authTest->getLoginUrl();

try {
    $getUser = $authTest->auth0->getUser();


} catch(\Exception $e) {

}

?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
<?php if($getUser): ?>
    <div class="bg-white rounded-xl shadow-md ">
        <div class="md:flex">
            <div class="p-8">
                <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">Logado</div>
                <p class="mt-2 text-gray-500">
                    <pre>
                    <? var_export($authTest->auth0->getRefreshToken()) . "\n\n"; ?>

                    <? var_export($authTest->auth0->getAccessToken()) . "\n\n"; ?>

                    <? var_export($getUser); ?>
                    </pre>
                </p>
                <br/>
                <br/>
                <a href="logout.php">Encerrar sessão</a>
            </div>
        </div>
    </div>
<?php else: ?>
    <div class="max-w-md mx-auto bg-white rounded-xl shadow-md overflow-hidden md:max-w-2xl">
        <div class="md:flex">
            <div class="p-8">
                <div class="uppercase tracking-wide text-sm text-indigo-500 font-semibold">Área restrita</div>
                <p class="mt-2 text-gray-500">
                    <a href="<?= $loginUrl; ?>">Efetuar login</a>
                </p>
            </div>
        </div>
    </div>
<?php endif; ?>
</body>
</html>