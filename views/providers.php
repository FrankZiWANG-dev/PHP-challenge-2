
<?php require 'views/parts/header.php';?>
<section>
    <div class="model">
        <div class="general">
            <h1>List of companies that are provider type :</h1>
            <ul>
              <?php foreach ($providers as $key => $value) { ?>
                    <li>
                        <a href="company_detail/<?=$value['id']?>"><h3><?=$value['name']?></h3></a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</section>

<?php require 'views/parts/footer.php';?>

