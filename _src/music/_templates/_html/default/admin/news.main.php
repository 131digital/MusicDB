<table width=100% >
    <thead>
        <th> Post Title </th>
        <th> Date </th>
        <th> Status </th>
        <th> Action </th>
    </thead>
    <tbody>
    <?php
        $this->news_listing(30);
    ?>
    </tbody>
</table>
<nav>
    <?php
        $this->news_nav(30);
    ?>
</nav>