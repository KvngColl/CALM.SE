<nav>
    <input type="checkbox" id="check">
    <label for="check">
        <div class="hamburger">
            <div class="line"></div>
            <div class="line"></div>
            <div class="line"></div>
        </div>
    </label>

    <label class="p-name">Bright Idea</label>
    <ul class="navigation">
        <label for="check">
            <a href="" class="close">
                <span class="c">close</span>
                <span class="x">&times;</span>
            </a>
        </label>
        <li>
            <a href="index.php" class="<?php echo $currentPage == "home" ? "active" : "" ?>">Home</a>
        </li>
        <li>
            <a href="mainpage.php" class="<?php echo $currentPage == "main" ? "active" : "" ?>">Financial Plan</a>
        </li>
        <li>
            <a href="insurance.php" class="<?php echo $currentPage == "insurance" ? "active" : "" ?>">Insurance Option</a>
        </li>
        <li>
            <a href="contact.php" class="<?php echo $currentPage == "contact" ? "active" : "" ?>">Contact</a>
        </li>
    </ul>
</nav>