<style>
/* css navbar */
.bg-info{
    height: 675px;
}
</style>

<div class="col-sm-2 px-1 bg-info sticky-top">
    <div class="py-2 sticky-top flex-grow-1">
        <div class="nav flex-sm-column">
            <a href="../index.php" class="btn btn-info">Home</a><br>
            <a href="../siswa/tabel.php" class="btn btn-info">Siswa</a><br>
            <?php
                if ($_SESSION['tipe'] == 1) {
                    echo
                    "<a href='../pelajaran/tabelPelajaran.php' class='btn btn-info'>Pelajaran</a><br>";
                }
            ?>
            <div class="btn-group dropdown">
                <?php if ($_SESSION['tipe'] == 1): ?>
                    <button type="button" class="dropdown-toggle btn btn-info" data-toggle="dropdown" id="dropdownMenuButton" aria-haspopup="true" aria-expanded="false">
                        Nilai
                    </button>  
                <?php else: ?>
                    <a class='btn btn-info' href='../nilai/tabelNilai.php'>Nilai</a> 
                <?php endif ?>
                <div class="dropdown-menu">
                    <?php
                        if ($_SESSION['tipe'] == 1) {
                           echo
                           "<a class='dropdown-item' href='../nilai/search.php'>Cari Nilai Berdasarkan Siswa</a>
                           <a class='dropdown-item' href='../nilai/formNilai.php'>Tambah Nilai Siswa</a>
                           <a class='dropdown-item' href='../nilai/searchPelajaran.php'>Cari Nilai Berdasarkan Pelajaran</a>";
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>