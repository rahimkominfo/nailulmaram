<?= '<?xml version="1.0" encoding="UTF-8"?>' ?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    <!-- Home -->
    <url>
        <loc><?= base_url() ?></loc>
        <priority>1.0</priority>
        <changefreq>daily</changefreq>
    </url>

    <!-- Profil -->
    <url>
        <loc><?= base_url('profil') ?></loc>
        <priority>0.8</priority>
        <changefreq>monthly</changefreq>
    </url>

    <!-- Berita List -->
    <url>
        <loc><?= base_url('berita') ?></loc>
        <priority>0.9</priority>
        <changefreq>daily</changefreq>
    </url>

    <!-- Galeri List -->
    <url>
        <loc><?= base_url('galeri') ?></loc>
        <priority>0.7</priority>
        <changefreq>weekly</changefreq>
    </url>

    <!-- Dinamis Artikel -->
    <?php foreach ($artikels as $artikel) : ?>
    <url>
        <loc><?= base_url('berita/baca/' . $artikel['slug']) ?></loc>
        <lastmod><?= date('Y-m-d', strtotime($artikel['updated_at'] ?? $artikel['tanggal_publikasi'])) ?></lastmod>
        <priority>0.8</priority>
        <changefreq>monthly</changefreq>
    </url>
    <?php endforeach; ?>

    <!-- Dinamis Galeri Album -->
    <?php foreach ($galeris as $galeri) : ?>
    <url>
        <loc><?= base_url('galeri/album/' . $galeri['galeri_id']) ?></loc>
        <lastmod><?= date('Y-m-d', strtotime($galeri['updated_at'] ?? $galeri['created_at'])) ?></lastmod>
        <priority>0.6</priority>
        <changefreq>monthly</changefreq>
    </url>
    <?php endforeach; ?>
</urlset>
