<?php require 'views/parts/header.php'; ?>
<div class="">
	<div class="">
		<div>
			<h1>Invoices</h1>
			<table>
				<caption>Invoices List</caption>
				<tr>
					<th>Date</th>
					<th>Person</th>
				</tr>
				<?php foreach ($invoices as $key => $value) { ?>
					<tr>
						<td><?=$value['date']?></td>
						<td><a href="?page=invoice_detail&number=<?=$value['number']?>"><?=$value['number']?></a></td>
						<td><?= $value['person'] ?></td>
					</tr>
				<?php } ?>
			</table>
		</div>
	</div>
</div>
<?php require 'views/parts/footer.php'; ?>
