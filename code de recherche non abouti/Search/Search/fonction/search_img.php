<?php
	session_start();

	require_once('../connexion.php');

	if (isset($_GET ['image'])) {
		$image = (String) trim($_GET['image']);
		$req = $DB->query("SElECT * FROM images WHERE nom LIKE ? LIMIT 10", array("%$image%"));

		$req = $req->fetchALL();
		foreach ($req as $r) {
		?>
			<div style="margin-top: 20px 0; border-bottom: 2px solid #ccc">
				<?= $r['nom'] . " " . $r['Role'] ?>
			</div>
		<?php
		}

	}
?>