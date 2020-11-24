<?php if (!empty($kontak)):?>
	<?php $no = 0; foreach ($kontak as $key => $value): $no++; ?>
		<tr>
			<td><?=$no?></td>
			<td><?=$value['grup_nama']?></td>
			<td><?=$value['nama']?></td>
			<td><?=$value['no']?></td>
			<td>
				<a class="btn btn-sm btn-warning" title="Edit" href="<?=site_url('kontak/form/'.$value['id'])?>"><i class="fa fa-pencil"></i></a>
			 	<a class="btn btn-sm btn-danger" onclick="return confirm('Apakah anda yakun mau menghapus data ini?')" title="Hapus" href="<?=site_url('kontak/delete/'.$value['id'])?>"><i class="fa fa-trash"></i></a>
			 </td>
		</tr>
	<?php endforeach; ?>
<?php else: ?>
	<tr>
		<td colspan="4">Data Kosong</td>
	</tr>
<?php endif; ?>