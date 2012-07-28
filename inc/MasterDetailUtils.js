		/*setidaknya harus punya 1 baris detail*/
		var TransactionDetailNumber=1;
		var TransactionDetailShown=1;
		/*function ini dipanggil ketika ingin menambah baris detil transaksi*/
		function addTransactionDetail(){
			TransactionDetailNumber++;
			TransactionDetailShown++;
			var NewRow=document.createElement("DIV");
			var Place=document.getElementById("TransactionPlace");
			NewRow.innerHTML=document.getElementById("TransactionTemplate").innerHTML.replace(/_N_/g,TransactionDetailNumber);
			NewRow.id="TransactionDetail"+TransactionDetailNumber;
			NewRow.style.display="block";
			Place.appendChild(NewRow);
			document.getElementById("TransactionDetailCount").value=TransactionDetailNumber;
			afterAddDetail();
		}
		/*function ini dihapus ketika ingin menghapus baris detil transaksi*/
		function deleteTransactionDetailRow(RowIndex){
			/*setidaknya harus punya 1 baris detail*/
			if (TransactionDetailShown>1){
				document.getElementById("TransactionDetail"+RowIndex).style.display="none";
				document.getElementById("TransactionStatus"+RowIndex).value="0";
				TransactionDetailShown--;
				afterDeleteDetail();
			}
			else{
				alert('Harus ada setidaknya 1 baris detail');
			}
		}
