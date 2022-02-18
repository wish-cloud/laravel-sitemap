<?php echo '<?xml version="1.0" encoding="UTF-8"?>'."\n"; ?>
<?php if ($style !== null) {
    echo '<?xml-stylesheet href="'.$style.'" type="text/xsl"?>'."\n";
} ?>
<sitemapindex xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
<?php foreach ($sitemaps as $sitemap) { ?>
    <sitemap>
        <loc><?php echo $sitemap['loc'] ?></loc>
    <?php if ($sitemap['lastmod'] !== null) { ?>
        <lastmod><?php echo date('Y-m-d\TH:i:sP', strtotime($sitemap['lastmod'])) ?></lastmod>
    <?php } ?>
    </sitemap>
<?php } ?>
</sitemapindex>
