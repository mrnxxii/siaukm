<section class="content-header">
      <h1>
        DATA LPJ
      </h1>
</section>
<table border="1">
  <thead>
  <tr>
    <th>No LPJ</th>
    <th>Tanggal Upload</th>
    <th>Nama UKM</th>
    <th>Nama Kegiatan</th>
    <th>Ketua Panitia</th>
    <th>Nomer Telpon</th>
    <th>Tanggal Kegiatan</th>
    <th>Nama File</th>
    <th>Admin Kemahasiswaan</th>
    <th>KA.SUBBAK</th>
    <th>KA.BAKPK</th>
    <th>WADIR III</th>

  </tr>
  </thead>
  <tbody>

    <?php
    include "../siau/koneksi.php";
    $query = mysqli_query($koneksi, "SELECT * FROM lpj") or die (mysqli_error());
    while($data = mysqli_fetch_array($query)): ?>
          <tr>
              <td><?php echo $data['no_lpj']; ?></td>
              <td><?php echo $data['tgl_upload']; ?></td>
              <td><?php echo $data['nama_ukm']; ?></td>
              <td><?php echo $data['nama_kegiatan']; ?></td>
              <td><?php echo $data['ketua_panitia']; ?></td>
              <td><?php echo $data['no_telp']; ?></td>
              <td><?php echo $data['tgl_kegiatan']; ?></td>
              <td><?php echo $data['input_lpj']; ?></td>
              <td><?php echo $data['status_lpj']; ?></td>
              <td><?php echo $data['status_lpj2']; ?></td>
              <td><?php echo $data['status_lpj3']; ?></td>
              <td><?php echo $data['status_lpj4']; ?></td>
          </tr>
      <?php
      endwhile;
      ?>
  </tbody>
</table>
