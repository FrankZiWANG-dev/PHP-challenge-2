<?php require 'views/parts/header.php'; ?>

<section>
	<div class="Btn-add">
    	<span>
      		<?php if ($_SESSION['role'] == 'admin') { ?>
                <button type="button" name="addInvoice"><a href="create-invoice">Add invoice</a></button>
                <button type="button" name="addCompany"><a href="create-company">Add company</a></button>
                <button type="button" name="addPerson"><a href="create-person">Add person</a></button>
            <?php } ?>
		</span>
	</div>
		<div>
        <h2><a href="companies">Companies</a></h2>
            <h3>
                <a class="nav-link" href="clients">Clients</a> /
                <a class="nav-link" href="providers">Providers</a>
            </h3>
				<table >
					<caption>List of last five companies</caption>
					<tr>
						<th>Name</th>
						<th>Country</th>
                        <th>Vat</th>
						<th>Type</th>
                        <?php if ($_SESSION['role'] == 'admin') { ?>
                           <th colspan="2" ></th>
                        <?php } ?>
					</tr>
					<?php foreach ($companies as $key => $value) { ?>
						<tr>
							<td><a href="edit_company/<?=$value['companyId']?>"><?= $value['name']?></a></td>
                            <td><?= $value['country']?></td>
                            <td><?= $value['vat']?></td>
                            <td><?= $value['type']?></td>
							<?php if ($_SESSION['role'] == 'admin') { ?>
                                <td><a href="edit_company/<?=$value['companyId']?>"><i class="fa fa-edit"></i></a></td>
							    <td><a href="delete_company/<?=$value['companyId']?>"><i class="fa fa-trash"></i></a></td>
						    <?php } ?>
                        </tr>
					<?php } ?>
				</table>
        </div>
    <div>
				<h2><a href="invoice">Invoices</a></h2>
				<table>
					<caption>List of last five invoices</caption>
					<tr>
						<th>Number</th>
						<th>Date</th>
						<th>Company</th>
                        <?php if ($_SESSION['role'] == 'admin') { ?>
						    <th colspan="2"></th>
                        <?php } ?>
					</tr>
					<?php foreach ($invoices as $key => $value) { ?>
						<tr>
							<td><a href="editInvoice&id=<?=$value['id']?>"><?= $value['number']?></a></td>
							<td><?= $value['date']?></td>
							<td><?= $value['name']?></td>
                            <?php if ($_SESSION['role'] == 'admin') { ?>
							    <td><a href="editInvoice&id=<?=$value['id']?>"><i class="fa fa-edit"></i></a></td>
							    <td><a href="confirmDeleteInvoice&id=<?=$value['id']?>" target="blank" meta="refresh"><i class="fa fa-trash"></i></a></td>
							<?php } ?>
                        </tr>
					<?php } ?>
				</table>
			</div>
			<div>
                <h2><a href="people">Contacts</a></h2>
				<table>
					<caption>List of last five contacts</caption>
					<tr>
						<th>Number</th>
						<th>Firstname Lastname</th>
						<th>E-mail</th>
						<th>Company</th>
                        <?php if ($_SESSION['role'] == 'admin') { ?>
						    <th colspan="2"></th>
                        <?php } ?>
					</tr>
					<?php foreach ($persons as $key => $value) { ?>
						<tr>
							<td><?=$value['id']?></td>
							<td>
								<a href="edit_contact/<?=$value['id']?>"><?= $value['firstname']?> <?= $value['lastname']?></a>
							</td>
							<td class=""><?= $value['email']?></td>
							<td><?= $value['name']?></td>
                            <?php if ($_SESSION['role'] == 'admin') { ?>
							    <td><a href="edit_contact/<?=$value['id']?>"><i class="fa fa-edit"></i></a></td>
							    <td><a href="delete_contact/<?=$value['id']?>" target="blank" meta="refresh"><i class="fa fa-trash"></i></a></td>
						    <?php } ?>
                        </tr>
					<?php } ?>
			</table>
		</div>
</section>

<?php require 'views/parts/footer.php'; ?>
