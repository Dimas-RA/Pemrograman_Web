<?php
require_once '../config/auth.php';
require_once '../config/database.php';
require_admin();

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

/* dropdown */
$catRes   = mysqli_query($conn, "SELECT nama FROM categories ORDER BY nama ASC");
$brandRes = mysqli_query($conn, "SELECT id, nama FROM brands ORDER BY nama ASC");

/* default */
$produk = [
  'nama_produk'=>'','kategori'=>'','brand_id'=>'',
  'kebutuhan'=>'','harga'=>'','deskripsi'=>'',
  'gambar'=>'','is_promo'=>0
];
$selectedTags = [];

/* LOAD EDIT */
if ($id > 0) {
  $stmt = mysqli_prepare($conn,"SELECT * FROM products WHERE id=?");
  mysqli_stmt_bind_param($stmt,"i",$id);
  mysqli_stmt_execute($stmt);
  $produk = mysqli_stmt_get_result($stmt)->fetch_assoc();

  $stmtT = mysqli_prepare($conn,"SELECT tag_id FROM product_tags WHERE product_id=?");
  mysqli_stmt_bind_param($stmtT,"i",$id);
  mysqli_stmt_execute($stmtT);
  $resT = mysqli_stmt_get_result($stmtT);
  while($t=mysqli_fetch_assoc($resT)){
    $selectedTags[] = (int)$t['tag_id'];
  }
}

/* SAVE */
$error='';
if($_SERVER['REQUEST_METHOD']==='POST'){

  $nama_produk = trim($_POST['nama_produk']);
  $kategori    = trim($_POST['kategori']);
  $brand_id    = $_POST['brand_id']!==''?(int)$_POST['brand_id']:null;
  $kebutuhan   = trim($_POST['kebutuhan']);
  $harga       = (int)$_POST['harga'];
  $deskripsi   = trim($_POST['deskripsi']);
  $is_promo    = isset($_POST['is_promo'])?1:0;
  $tagsChosen  = $_POST['tags'] ?? [];

  if($nama_produk===''||$kategori===''||!$harga){
    $error='Nama, kategori & harga wajib.';
  }

  /* upload */
  $newImg='';
  if(!$error && !empty($_FILES['gambar']['name'])){
    $ext=strtolower(pathinfo($_FILES['gambar']['name'],PATHINFO_EXTENSION));
    if(!in_array($ext,['jpg','jpeg','png','webp'])){
      $error='Format gambar salah';
    }else{
      $newImg='product_'.time().'.'.$ext;
      move_uploaded_file($_FILES['gambar']['tmp_name'],"../assets/images/product/".$newImg);
    }
  }

  if(!$error){

    /* UPDATE */
    if($id>0){
      if($newImg){
        $stmt=mysqli_prepare($conn,
          "UPDATE products SET
          nama_produk=?,kategori=?,brand_id=?,kebutuhan=?,
          harga=?,deskripsi=?,gambar=?,is_promo=? WHERE id=?"
        );
        mysqli_stmt_bind_param($stmt,"ssisissii",
          $nama_produk,$kategori,$brand_id,$kebutuhan,
          $harga,$deskripsi,$newImg,$is_promo,$id
        );
      }else{
        $stmt=mysqli_prepare($conn,
          "UPDATE products SET
          nama_produk=?,kategori=?,brand_id=?,kebutuhan=?,
          harga=?,deskripsi=?,is_promo=? WHERE id=?"
        );
        mysqli_stmt_bind_param($stmt,"ssisissi",
          $nama_produk,$kategori,$brand_id,$kebutuhan,
          $harga,$deskripsi,$is_promo,$id
        );
      }
      mysqli_stmt_execute($stmt);

      /* TAGS */
      mysqli_query($conn,"DELETE FROM product_tags WHERE product_id=$id");
      if(is_array($tagsChosen)){
        $stmtT=mysqli_prepare($conn,
          "INSERT INTO product_tags (product_id,tag_id) VALUES (?,?)"
        );
        foreach($tagsChosen as $tid){
          $tid=(int)$tid;
          mysqli_stmt_bind_param($stmtT,"ii",$id,$tid);
          mysqli_stmt_execute($stmtT);
        }
      }

    }

    header("Location: products.php");exit;
  }
}

/* preview */
$gambarPreview = $produk['gambar']
 ? "../assets/images/product/".$produk['gambar']
 : "../assets/images/no-image/no-image.png";
?>

<!DOCTYPE html>
<html>
<head>
<title>Produk</title>
<link rel="stylesheet" href="/tormid/assets/css/style.css">
</head>
<body>

<?php include '../partials/header.php'; ?>

<section class="container" style="max-width:850px">

<h2><?= $id?'Edit':'Tambah' ?> Produk</h2>

<?php if($error): ?>
<div class="empty-state"><?= $error ?></div>
<?php endif; ?>

<form method="POST" enctype="multipart/form-data">

<label>Nama</label>
<input name="nama_produk" value="<?= htmlspecialchars($produk['nama_produk']) ?>" required>

<label>Kategori</label>
<select name="kategori" required>
<?php while($c=mysqli_fetch_assoc($catRes)): ?>
<option value="<?= $c['nama'] ?>" <?= $produk['kategori']===$c['nama']?'selected':'' ?>>
<?= $c['nama'] ?>
</option>
<?php endwhile; ?>
</select>

<label>Brand</label>
<select name="brand_id">
<option value="">-- Opsional --</option>
<?php while($b=mysqli_fetch_assoc($brandRes)): ?>
<option value="<?= $b['id'] ?>" <?= (string)$produk['brand_id']===(string)$b['id']?'selected':'' ?>>
<?= $b['nama'] ?>
</option>
<?php endwhile; ?>
</select>

<label>Harga</label>
<input type="number" name="harga" value="<?= $produk['harga'] ?>" required>

<label>Deskripsi</label>
<textarea name="deskripsi"><?= htmlspecialchars($produk['deskripsi']) ?></textarea>

<img src="<?= $gambarPreview ?>" style="width:150px"><br>
<input type="file" name="gambar">

<label>
<input type="checkbox" name="is_promo" <?= $produk['is_promo']?'checked':'' ?>>
 Promo
</label>

<hr>

<h3>Tags</h3>
<div style="display:flex;gap:10px;flex-wrap:wrap">
<?php
$tagRes=mysqli_query($conn,"SELECT id,nama FROM tags ORDER BY nama ASC");
while($t=mysqli_fetch_assoc($tagRes)):
$tid=(int)$t['id'];
?>
<label style="background:#fff;padding:10px;border-radius:8px">
<input type="checkbox" name="tags[]" value="<?= $tid ?>"
<?= in_array($tid,$selectedTags,true)?'checked':'' ?>>
<?= htmlspecialchars($t['nama']) ?>
</label>
<?php endwhile; ?>
</div>

<button class="btn">Simpan</button>
<a href="products.php" class="btn" style="background:#6b7280">Batal</a>

</form>
</section>

<?php include '../partials/footer.php'; ?>
</body>
</html>
