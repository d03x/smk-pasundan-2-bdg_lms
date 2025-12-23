<?php

app('router')->setCompiledRoutes(
    array (
  'compiled' => 
  array (
    0 => false,
    1 => 
    array (
      '/up' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'generated::29TTxgMTKb20uKrK',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/fcm-cloud/save-fcm-token' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'save-fcm-token',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/send-notification' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'send',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/login' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'login',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'login.check',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/logout' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'auth.logout',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/profile' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'profile.edit',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'profile.update',
          ),
          1 => NULL,
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/password' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'password.update',
          ),
          1 => NULL,
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/kelas-management' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.management-kelas.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.management-kelas.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/kelas-management/assign-class-to-student' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.management-kelas.storeSiswa',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/kelas-management/remove-class-to-student' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.management-kelas.removeStudent',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/user-management' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.user-management.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/user-management/siswa' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.user-management.siswa',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/user-management/tambah' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.user-management.tambah-siswa',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.user-management.simpan-siswa',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/user-management/guru' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.user-management.guru',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/user-management/tambah-guru' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.user-management.tambahGuru',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.user-management.simpanGuru',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/user-management/guru-add-matpel' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.user-management.guru-add-matpel',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/laporan' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.laporan.index',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/laporan/siswa/cetak' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.laporan.cetakLaporanSiswa',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/laporan/guru/cetak' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.laporan.laporan.guru.cetak',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/laporan/kelas/cetak' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.laporan.laporan.kelas.cetak',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/laporan/nilai/cetak' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.laporan.laporan.nilai.cetak',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/admin/akademik/akademik/plotting' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.akademik.akademik.plotting',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.akademik.akademik.plotting.store',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'home',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/siswa/materi' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'siswa.materi',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/siswa/tugas' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'siswa.tugas',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/guru/publish-materi' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'guru.materi.publish',
          ),
          1 => NULL,
          2 => 
          array (
            'PATCH' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/guru/tugas' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'guru.tugas',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/guru/tugas/tambah' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'guru.tugas.tambah',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'guru.tugas.simpanTugas',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/guru/get-kelas-by-matpel' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'guru.get-kelas-by-matpel',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/guru/get-siswa' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'guru.get-siswa',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/guru/nilai/simpan' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'guru.nilai.simpan',
          ),
          1 => NULL,
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/guru/nilai' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'guru.nilai.kelola',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/guru/nilai/with-filter' => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'guru.nilai.filter',
          ),
          1 => NULL,
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
    ),
    2 => 
    array (
      0 => '{^(?|/admin/(?|kelas\\-management/([^/]++)(?|(*:46))|user\\-management/(?|edit\\-(?|siswa/([^/]++)(?|(*:100))|guru/([^/]++)(?|(*:125)))|delete\\-siswa/([^/]++)(*:157)))|/s(?|iswa/(?|materi/([^/]++)(*:195)|tugas/([^/]++)/kerjakan(?|(*:229)))|torage/(.*)(*:250))|/guru/(?|materi(?|(?:/([^/]++))?(*:291)|/([^/]++)/(?|tambah\\-materi(*:326)|simpan\\-materi(*:348)))|delete\\-materi/([^/]++)(*:381)|([^/]++)/tugas(*:403)|tugas/([^/]++)(?|/(?|periksa(*:439)|edit(*:451)|([^/]++)(*:467))|(*:476))|nilai/([^/]++)(?|(*:502))))/?$}sDu',
    ),
    3 => 
    array (
      46 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.management-kelas.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.management-kelas.destroy',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      100 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.user-management.edit-siswa',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.user-management.update-siswa',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      125 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.user-management.editGuru',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'admin.user-management.updateGuru',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      157 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'admin.user-management.udestroy-siswa',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      195 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'siswa.materi.view',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      229 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'siswa.tugas.kerjakan',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'siswa.tugas.kerjakan.kerjakanSimpan',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        2 => 
        array (
          0 => 
          array (
            '_route' => 'siswa.tugas.kerjakan.batalkanPengumpulan',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      250 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'storage.local',
          ),
          1 => 
          array (
            0 => 'path',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      291 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'guru.materi',
            'kelas_kode' => NULL,
          ),
          1 => 
          array (
            0 => 'kelas_kode',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      326 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'guru.materi.tambah',
            'kelas_kode' => NULL,
          ),
          1 => 
          array (
            0 => 'kelas_kode',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      348 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'guru.materi.tambah.simpan',
            'kelas_kode' => NULL,
          ),
          1 => 
          array (
            0 => 'kelas_kode',
          ),
          2 => 
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      381 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'guru.materi.delete',
          ),
          1 => 
          array (
            0 => 'materi_id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      403 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'guru.tugas.all_tugas',
          ),
          1 => 
          array (
            0 => 'kelas_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      439 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'guru.tugas.periksa',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      451 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'guru.tugas.edit',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      467 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'guru.tugas.lihat_jawaban',
          ),
          1 => 
          array (
            0 => 'id',
            1 => 'jawaban_id',
          ),
          2 => 
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      476 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'guru.tugas.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'guru.tugas.delete',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      502 => 
      array (
        0 => 
        array (
          0 => 
          array (
            '_route' => 'guru.nilai.update',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 => 
        array (
          0 => 
          array (
            '_route' => 'guru.nilai.delete',
          ),
          1 => 
          array (
            0 => 'id',
          ),
          2 => 
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        2 => 
        array (
          0 => NULL,
          1 => NULL,
          2 => NULL,
          3 => NULL,
          4 => false,
          5 => false,
          6 => 0,
        ),
      ),
    ),
    4 => NULL,
  ),
  'attributes' => 
  array (
    'generated::29TTxgMTKb20uKrK' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'up',
      'action' => 
      array (
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:0:{}s:8:"function";s:823:"function () {
                    $exception = null;

                    try {
                        \\Illuminate\\Support\\Facades\\Event::dispatch(new \\Illuminate\\Foundation\\Events\\DiagnosingHealth);
                    } catch (\\Throwable $e) {
                        if (app()->hasDebugModeEnabled()) {
                            throw $e;
                        }

                        report($e);

                        $exception = $e->getMessage();
                    }

                    return response(\\Illuminate\\Support\\Facades\\View::file(\'D:\\\\work\\\\project\\\\lms\\\\vendor\\\\laravel\\\\framework\\\\src\\\\Illuminate\\\\Foundation\\\\Configuration\'.\'/../resources/health-up.blade.php\', [
                        \'exception\' => $exception,
                    ]), status: $exception ? 500 : 200);
                }";s:5:"scope";s:54:"Illuminate\\Foundation\\Configuration\\ApplicationBuilder";s:4:"this";N;s:4:"self";s:32:"00000000000003460000000000000000";}}',
        'as' => 'generated::29TTxgMTKb20uKrK',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'save-fcm-token' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'fcm-cloud/save-fcm-token',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\NotifServiceController@saveFcmToken',
        'controller' => 'App\\Http\\Controllers\\NotifServiceController@saveFcmToken',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'save-fcm-token',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'send' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'send-notification',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\NotifServiceController@testSend',
        'controller' => 'App\\Http\\Controllers\\NotifServiceController@testSend',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'send',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'login' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\LoginController@__invoke',
        'controller' => 'App\\Http\\Controllers\\LoginController',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'login',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'login.check' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'login',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\LoginController@checkLogin',
        'controller' => 'App\\Http\\Controllers\\LoginController@checkLogin',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'login.check',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'auth.logout' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'logout',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\LoginController@logout',
        'controller' => 'App\\Http\\Controllers\\LoginController@logout',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'auth.logout',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'profile.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'authenticated',
        ),
        'uses' => 'App\\Http\\Controllers\\ProfileController@__invoke',
        'controller' => 'App\\Http\\Controllers\\ProfileController',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'profile.edit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'profile.update' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'profile',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'authenticated',
        ),
        'uses' => 'App\\Http\\Controllers\\ProfileController@update',
        'controller' => 'App\\Http\\Controllers\\ProfileController@update',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'profile.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'password.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'password',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'authenticated',
        ),
        'uses' => 'App\\Http\\Controllers\\ProfileController@updatePassword',
        'controller' => 'App\\Http\\Controllers\\ProfileController@updatePassword',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'password.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'authenticated',
          2 => 'authenticated:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\HomeController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\HomeController@index',
        'as' => 'admin.index',
        'namespace' => NULL,
        'prefix' => '/admin',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.management-kelas.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/kelas-management',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'authenticated',
          2 => 'authenticated:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ManagementKelasController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\ManagementKelasController@index',
        'as' => 'admin.management-kelas.index',
        'namespace' => NULL,
        'prefix' => 'admin/kelas-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.management-kelas.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/kelas-management',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'authenticated',
          2 => 'authenticated:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ManagementKelasController@store',
        'controller' => 'App\\Http\\Controllers\\Admin\\ManagementKelasController@store',
        'as' => 'admin.management-kelas.store',
        'namespace' => NULL,
        'prefix' => 'admin/kelas-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.management-kelas.storeSiswa' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/kelas-management/assign-class-to-student',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'authenticated',
          2 => 'authenticated:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ManagementKelasController@storeSiswa',
        'controller' => 'App\\Http\\Controllers\\Admin\\ManagementKelasController@storeSiswa',
        'as' => 'admin.management-kelas.storeSiswa',
        'namespace' => NULL,
        'prefix' => 'admin/kelas-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.management-kelas.removeStudent' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/kelas-management/remove-class-to-student',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'authenticated',
          2 => 'authenticated:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ManagementKelasController@removeStudent',
        'controller' => 'App\\Http\\Controllers\\Admin\\ManagementKelasController@removeStudent',
        'as' => 'admin.management-kelas.removeStudent',
        'namespace' => NULL,
        'prefix' => 'admin/kelas-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.management-kelas.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'admin/kelas-management/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'authenticated',
          2 => 'authenticated:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ManagementKelasController@update',
        'controller' => 'App\\Http\\Controllers\\Admin\\ManagementKelasController@update',
        'as' => 'admin.management-kelas.update',
        'namespace' => NULL,
        'prefix' => 'admin/kelas-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.management-kelas.destroy' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/kelas-management/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'authenticated',
          2 => 'authenticated:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\ManagementKelasController@destroy',
        'controller' => 'App\\Http\\Controllers\\Admin\\ManagementKelasController@destroy',
        'as' => 'admin.management-kelas.destroy',
        'namespace' => NULL,
        'prefix' => 'admin/kelas-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.user-management.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/user-management',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'authenticated',
          2 => 'authenticated:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\UserManagementController@index',
        'controller' => 'App\\Http\\Controllers\\Admin\\UserManagementController@index',
        'as' => 'admin.user-management.index',
        'namespace' => NULL,
        'prefix' => 'admin/user-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.user-management.siswa' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/user-management/siswa',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'authenticated',
          2 => 'authenticated:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\UserManagementController@siswa',
        'controller' => 'App\\Http\\Controllers\\Admin\\UserManagementController@siswa',
        'as' => 'admin.user-management.siswa',
        'namespace' => NULL,
        'prefix' => 'admin/user-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.user-management.tambah-siswa' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/user-management/tambah',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'authenticated',
          2 => 'authenticated:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\UserManagementController@tambahSiswa',
        'controller' => 'App\\Http\\Controllers\\Admin\\UserManagementController@tambahSiswa',
        'as' => 'admin.user-management.tambah-siswa',
        'namespace' => NULL,
        'prefix' => 'admin/user-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.user-management.simpan-siswa' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/user-management/tambah',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'authenticated',
          2 => 'authenticated:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\UserManagementController@simpanSiswa',
        'controller' => 'App\\Http\\Controllers\\Admin\\UserManagementController@simpanSiswa',
        'as' => 'admin.user-management.simpan-siswa',
        'namespace' => NULL,
        'prefix' => 'admin/user-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.user-management.edit-siswa' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/user-management/edit-siswa/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'authenticated',
          2 => 'authenticated:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\UserManagementController@editSiswa',
        'controller' => 'App\\Http\\Controllers\\Admin\\UserManagementController@editSiswa',
        'as' => 'admin.user-management.edit-siswa',
        'namespace' => NULL,
        'prefix' => 'admin/user-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.user-management.update-siswa' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/user-management/edit-siswa/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'authenticated',
          2 => 'authenticated:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\UserManagementController@updateSiswa',
        'controller' => 'App\\Http\\Controllers\\Admin\\UserManagementController@updateSiswa',
        'as' => 'admin.user-management.update-siswa',
        'namespace' => NULL,
        'prefix' => 'admin/user-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.user-management.udestroy-siswa' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'admin/user-management/delete-siswa/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'authenticated',
          2 => 'authenticated:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\UserManagementController@destroySiswa',
        'controller' => 'App\\Http\\Controllers\\Admin\\UserManagementController@destroySiswa',
        'as' => 'admin.user-management.udestroy-siswa',
        'namespace' => NULL,
        'prefix' => 'admin/user-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.user-management.guru' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/user-management/guru',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'authenticated',
          2 => 'authenticated:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\UserManagementController@guru',
        'controller' => 'App\\Http\\Controllers\\Admin\\UserManagementController@guru',
        'as' => 'admin.user-management.guru',
        'namespace' => NULL,
        'prefix' => 'admin/user-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.user-management.tambahGuru' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/user-management/tambah-guru',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'authenticated',
          2 => 'authenticated:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\UserManagementController@tambahGuru',
        'controller' => 'App\\Http\\Controllers\\Admin\\UserManagementController@tambahGuru',
        'as' => 'admin.user-management.tambahGuru',
        'namespace' => NULL,
        'prefix' => 'admin/user-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.user-management.simpanGuru' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/user-management/tambah-guru',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'authenticated',
          2 => 'authenticated:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\UserManagementController@simpanGuru',
        'controller' => 'App\\Http\\Controllers\\Admin\\UserManagementController@simpanGuru',
        'as' => 'admin.user-management.simpanGuru',
        'namespace' => NULL,
        'prefix' => 'admin/user-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.user-management.guru-add-matpel' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/user-management/guru-add-matpel',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'authenticated',
          2 => 'authenticated:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\UserManagementController@addMatpelToGuru',
        'controller' => 'App\\Http\\Controllers\\Admin\\UserManagementController@addMatpelToGuru',
        'as' => 'admin.user-management.guru-add-matpel',
        'namespace' => NULL,
        'prefix' => 'admin/user-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.user-management.editGuru' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/user-management/edit-guru/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'authenticated',
          2 => 'authenticated:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\UserManagementController@editGuru',
        'controller' => 'App\\Http\\Controllers\\Admin\\UserManagementController@editGuru',
        'as' => 'admin.user-management.editGuru',
        'namespace' => NULL,
        'prefix' => 'admin/user-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.user-management.updateGuru' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/user-management/edit-guru/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'authenticated',
          2 => 'authenticated:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\UserManagementController@updateGuru',
        'controller' => 'App\\Http\\Controllers\\Admin\\UserManagementController@updateGuru',
        'as' => 'admin.user-management.updateGuru',
        'namespace' => NULL,
        'prefix' => 'admin/user-management',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.laporan.index' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/laporan',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'authenticated',
          2 => 'authenticated:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\CetakLaporanController@__invoke',
        'controller' => 'App\\Http\\Controllers\\Admin\\CetakLaporanController',
        'as' => 'admin.laporan.index',
        'namespace' => NULL,
        'prefix' => 'admin/laporan',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.laporan.cetakLaporanSiswa' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/laporan/siswa/cetak',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'authenticated',
          2 => 'authenticated:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\CetakLaporanController@cetakLaporanSiswa',
        'controller' => 'App\\Http\\Controllers\\Admin\\CetakLaporanController@cetakLaporanSiswa',
        'as' => 'admin.laporan.cetakLaporanSiswa',
        'namespace' => NULL,
        'prefix' => 'admin/laporan',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.laporan.laporan.guru.cetak' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/laporan/guru/cetak',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'authenticated',
          2 => 'authenticated:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\CetakLaporanController@cetakGuru',
        'controller' => 'App\\Http\\Controllers\\Admin\\CetakLaporanController@cetakGuru',
        'as' => 'admin.laporan.laporan.guru.cetak',
        'namespace' => NULL,
        'prefix' => 'admin/laporan',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.laporan.laporan.kelas.cetak' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/laporan/kelas/cetak',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'authenticated',
          2 => 'authenticated:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\CetakLaporanController@cetakKelas',
        'controller' => 'App\\Http\\Controllers\\Admin\\CetakLaporanController@cetakKelas',
        'as' => 'admin.laporan.laporan.kelas.cetak',
        'namespace' => NULL,
        'prefix' => 'admin/laporan',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.laporan.laporan.nilai.cetak' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/laporan/nilai/cetak',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'authenticated',
          2 => 'authenticated:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\CetakLaporanController@cetakNilai',
        'controller' => 'App\\Http\\Controllers\\Admin\\CetakLaporanController@cetakNilai',
        'as' => 'admin.laporan.laporan.nilai.cetak',
        'namespace' => NULL,
        'prefix' => 'admin/laporan',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.akademik.akademik.plotting' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'admin/akademik/akademik/plotting',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'authenticated',
          2 => 'authenticated:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AkademikController@create',
        'controller' => 'App\\Http\\Controllers\\Admin\\AkademikController@create',
        'as' => 'admin.akademik.akademik.plotting',
        'namespace' => NULL,
        'prefix' => 'admin/akademik',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'admin.akademik.akademik.plotting.store' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'admin/akademik/akademik/plotting',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'authenticated',
          2 => 'authenticated:admin',
        ),
        'uses' => 'App\\Http\\Controllers\\Admin\\AkademikController@store',
        'controller' => 'App\\Http\\Controllers\\Admin\\AkademikController@store',
        'as' => 'admin.akademik.akademik.plotting.store',
        'namespace' => NULL,
        'prefix' => 'admin/akademik',
        'where' => 
        array (
        ),
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'home' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '/',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'authenticated',
        ),
        'uses' => 'App\\Http\\Controllers\\DashboardController@__invoke',
        'controller' => 'App\\Http\\Controllers\\DashboardController',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'home',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'siswa.materi' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'siswa/materi',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'authenticated',
          2 => 'authenticated:siswa',
        ),
        'uses' => 'App\\Http\\Controllers\\MateriController@showMateri',
        'controller' => 'App\\Http\\Controllers\\MateriController@showMateri',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'siswa.materi',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'siswa.tugas' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'siswa/tugas',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'authenticated',
          2 => 'authenticated:siswa',
        ),
        'uses' => 'App\\Http\\Controllers\\TugasSiswaController@showTugas',
        'controller' => 'App\\Http\\Controllers\\TugasSiswaController@showTugas',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'siswa.tugas',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'siswa.materi.view' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'siswa/materi/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'authenticated',
          2 => 'authenticated:siswa',
        ),
        'uses' => 'App\\Http\\Controllers\\MateriController@view',
        'controller' => 'App\\Http\\Controllers\\MateriController@view',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'siswa.materi.view',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'siswa.tugas.kerjakan' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'siswa/tugas/{id}/kerjakan',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'authenticated',
          2 => 'authenticated:siswa',
        ),
        'uses' => 'App\\Http\\Controllers\\TugasSiswaController@kerjakan',
        'controller' => 'App\\Http\\Controllers\\TugasSiswaController@kerjakan',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'siswa.tugas.kerjakan',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'siswa.tugas.kerjakan.kerjakanSimpan' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'siswa/tugas/{id}/kerjakan',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'authenticated',
          2 => 'authenticated:siswa',
        ),
        'uses' => 'App\\Http\\Controllers\\TugasSiswaController@kerjakanSimpan',
        'controller' => 'App\\Http\\Controllers\\TugasSiswaController@kerjakanSimpan',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'siswa.tugas.kerjakan.kerjakanSimpan',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'siswa.tugas.kerjakan.batalkanPengumpulan' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'siswa/tugas/{id}/kerjakan',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'authenticated',
          2 => 'authenticated:siswa',
        ),
        'uses' => 'App\\Http\\Controllers\\TugasSiswaController@batalkanPengumpulan',
        'controller' => 'App\\Http\\Controllers\\TugasSiswaController@batalkanPengumpulan',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'siswa.tugas.kerjakan.batalkanPengumpulan',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'guru.materi' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'guru/materi/{kelas_kode?}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'authenticated',
          2 => 'authenticated:guru',
        ),
        'uses' => 'App\\Http\\Controllers\\GuruMateriController@materi',
        'controller' => 'App\\Http\\Controllers\\GuruMateriController@materi',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'guru.materi',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'guru.materi.tambah' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'guru/materi/{kelas_kode?}/tambah-materi',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'authenticated',
          2 => 'authenticated:guru',
        ),
        'uses' => 'App\\Http\\Controllers\\GuruMateriController@tambahMateri',
        'controller' => 'App\\Http\\Controllers\\GuruMateriController@tambahMateri',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'guru.materi.tambah',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'guru.materi.tambah.simpan' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'guru/materi/{kelas_kode?}/simpan-materi',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'authenticated',
          2 => 'authenticated:guru',
        ),
        'uses' => 'App\\Http\\Controllers\\GuruMateriController@simpanMateri',
        'controller' => 'App\\Http\\Controllers\\GuruMateriController@simpanMateri',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'guru.materi.tambah.simpan',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'guru.materi.delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'guru/delete-materi/{materi_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'authenticated',
          2 => 'authenticated:guru',
        ),
        'uses' => 'App\\Http\\Controllers\\GuruMateriController@deleteMateri',
        'controller' => 'App\\Http\\Controllers\\GuruMateriController@deleteMateri',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'guru.materi.delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'guru.materi.publish' => 
    array (
      'methods' => 
      array (
        0 => 'PATCH',
      ),
      'uri' => 'guru/publish-materi',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'authenticated',
          2 => 'authenticated:guru',
        ),
        'uses' => 'App\\Http\\Controllers\\GuruMateriController@publishMateri',
        'controller' => 'App\\Http\\Controllers\\GuruMateriController@publishMateri',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'guru.materi.publish',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'guru.tugas' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'guru/tugas',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'authenticated',
          2 => 'authenticated:guru',
        ),
        'uses' => 'App\\Http\\Controllers\\Guru\\TugasController@__invoke',
        'controller' => 'App\\Http\\Controllers\\Guru\\TugasController',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'guru.tugas',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'guru.tugas.all_tugas' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'guru/{kelas_id}/tugas',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'authenticated',
          2 => 'authenticated:guru',
        ),
        'uses' => 'App\\Http\\Controllers\\Guru\\TugasController@index',
        'controller' => 'App\\Http\\Controllers\\Guru\\TugasController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'guru.tugas.all_tugas',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'guru.tugas.tambah' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'guru/tugas/tambah',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'authenticated',
          2 => 'authenticated:guru',
        ),
        'uses' => 'App\\Http\\Controllers\\Guru\\TugasController@tambah',
        'controller' => 'App\\Http\\Controllers\\Guru\\TugasController@tambah',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'guru.tugas.tambah',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'guru.tugas.simpanTugas' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'guru/tugas/tambah',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'authenticated',
          2 => 'authenticated:guru',
        ),
        'uses' => 'App\\Http\\Controllers\\Guru\\TugasController@simpanTugas',
        'controller' => 'App\\Http\\Controllers\\Guru\\TugasController@simpanTugas',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'guru.tugas.simpanTugas',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'guru.tugas.periksa' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'guru/tugas/{id}/periksa',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'authenticated',
          2 => 'authenticated:guru',
        ),
        'uses' => 'App\\Http\\Controllers\\Guru\\TugasController@periksaTugas',
        'controller' => 'App\\Http\\Controllers\\Guru\\TugasController@periksaTugas',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'guru.tugas.periksa',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'guru.tugas.edit' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'guru/tugas/{id}/edit',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'authenticated',
          2 => 'authenticated:guru',
        ),
        'uses' => 'App\\Http\\Controllers\\Guru\\TugasController@editTugas',
        'controller' => 'App\\Http\\Controllers\\Guru\\TugasController@editTugas',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'guru.tugas.edit',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'guru.tugas.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'guru/tugas/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'authenticated',
          2 => 'authenticated:guru',
        ),
        'uses' => 'App\\Http\\Controllers\\Guru\\TugasController@updateTugas',
        'controller' => 'App\\Http\\Controllers\\Guru\\TugasController@updateTugas',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'guru.tugas.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'guru.tugas.delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'guru/tugas/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'authenticated',
          2 => 'authenticated:guru',
        ),
        'uses' => 'App\\Http\\Controllers\\Guru\\TugasController@deleteTugas',
        'controller' => 'App\\Http\\Controllers\\Guru\\TugasController@deleteTugas',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'guru.tugas.delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'guru.tugas.lihat_jawaban' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'guru/tugas/{id}/{jawaban_id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'authenticated',
          2 => 'authenticated:guru',
        ),
        'uses' => 'App\\Http\\Controllers\\Guru\\JawabanController@__invoke',
        'controller' => 'App\\Http\\Controllers\\Guru\\JawabanController',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'guru.tugas.lihat_jawaban',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'guru.get-kelas-by-matpel' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'guru/get-kelas-by-matpel',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'authenticated',
          2 => 'authenticated:guru',
        ),
        'uses' => 'App\\Http\\Controllers\\Guru\\TugasController@getKelasByMatpel',
        'controller' => 'App\\Http\\Controllers\\Guru\\TugasController@getKelasByMatpel',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'guru.get-kelas-by-matpel',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'guru.get-siswa' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'guru/get-siswa',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'authenticated',
          2 => 'authenticated:guru',
        ),
        'uses' => 'App\\Http\\Controllers\\Guru\\TugasController@getSiswa',
        'controller' => 'App\\Http\\Controllers\\Guru\\TugasController@getSiswa',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'guru.get-siswa',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'guru.nilai.simpan' => 
    array (
      'methods' => 
      array (
        0 => 'POST',
      ),
      'uri' => 'guru/nilai/simpan',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'authenticated',
          2 => 'authenticated:guru',
        ),
        'uses' => 'App\\Http\\Controllers\\Guru\\NilaiController@simpan',
        'controller' => 'App\\Http\\Controllers\\Guru\\NilaiController@simpan',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'guru.nilai.simpan',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'guru.nilai.kelola' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'guru/nilai',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'authenticated',
          2 => 'authenticated:guru',
        ),
        'uses' => 'App\\Http\\Controllers\\Guru\\NilaiController@kelola_nilai',
        'controller' => 'App\\Http\\Controllers\\Guru\\NilaiController@kelola_nilai',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'guru.nilai.kelola',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'guru.nilai.filter' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'guru/nilai/with-filter',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'authenticated',
          2 => 'authenticated:guru',
        ),
        'uses' => 'App\\Http\\Controllers\\Guru\\NilaiController@index',
        'controller' => 'App\\Http\\Controllers\\Guru\\NilaiController@index',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'guru.nilai.filter',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'guru.nilai.update' => 
    array (
      'methods' => 
      array (
        0 => 'PUT',
      ),
      'uri' => 'guru/nilai/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'authenticated',
          2 => 'authenticated:guru',
        ),
        'uses' => 'App\\Http\\Controllers\\Guru\\NilaiController@update',
        'controller' => 'App\\Http\\Controllers\\Guru\\NilaiController@update',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'guru.nilai.update',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'guru.nilai.delete' => 
    array (
      'methods' => 
      array (
        0 => 'DELETE',
      ),
      'uri' => 'guru/nilai/{id}',
      'action' => 
      array (
        'middleware' => 
        array (
          0 => 'web',
          1 => 'authenticated',
          2 => 'authenticated:guru',
        ),
        'uses' => 'App\\Http\\Controllers\\Guru\\NilaiController@destroy',
        'controller' => 'App\\Http\\Controllers\\Guru\\NilaiController@destroy',
        'namespace' => NULL,
        'prefix' => '',
        'where' => 
        array (
        ),
        'as' => 'guru.nilai.delete',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
    'storage.local' => 
    array (
      'methods' => 
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'storage/{path}',
      'action' => 
      array (
        'uses' => 'O:55:"Laravel\\SerializableClosure\\UnsignedSerializableClosure":1:{s:12:"serializable";O:46:"Laravel\\SerializableClosure\\Serializers\\Native":5:{s:3:"use";a:3:{s:4:"disk";s:5:"local";s:6:"config";a:5:{s:6:"driver";s:5:"local";s:4:"root";s:39:"D:\\work\\project\\lms\\storage\\app/private";s:5:"serve";b:1;s:5:"throw";b:0;s:6:"report";b:0;}s:12:"isProduction";b:0;}s:8:"function";s:323:"function (\\Illuminate\\Http\\Request $request, string $path) use ($disk, $config, $isProduction) {
                    return (new \\Illuminate\\Filesystem\\ServeFile(
                        $disk,
                        $config,
                        $isProduction
                    ))($request, $path);
                }";s:5:"scope";s:47:"Illuminate\\Filesystem\\FilesystemServiceProvider";s:4:"this";N;s:4:"self";s:32:"00000000000003490000000000000000";}}',
        'as' => 'storage.local',
      ),
      'fallback' => false,
      'defaults' => 
      array (
      ),
      'wheres' => 
      array (
        'path' => '.*',
      ),
      'bindingFields' => 
      array (
      ),
      'lockSeconds' => NULL,
      'waitSeconds' => NULL,
      'withTrashed' => false,
    ),
  ),
)
);
