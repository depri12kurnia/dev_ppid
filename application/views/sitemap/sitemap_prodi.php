<?php
header('Content-type: application/xml; charset="ISO-8859-1"', true);
$datetime1 = new DateTime(date('Y-m-d H:i:s'));
?>

<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <url>
        <loc><?= base_url() ?></loc>
        <lastmod><?= date('Y-m-d') ?></lastmod>
    </url>
    <?php foreach ($post as $item) { ?>
        <url>
            <loc><?= base_url('prodi/read/' . $item['slug_prodi']) ?></loc>
            <lastmod><?= date('Y-m-d', strtotime($item['tanggal'])) ?></lastmod>
        </url>
    <?php } ?>
</urlset>