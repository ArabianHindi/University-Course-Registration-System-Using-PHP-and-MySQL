<?php include('HMENU.php');?>

<section class="food-search text-center">
        <div class="container">

            <form action="<?php echo SITEURL;?>professor/search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Student.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>
        </div>
    </section>
<?php include('HFOOTER.php');?>
