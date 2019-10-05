<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<title>Document</title>
</head>
<body>
	<h1>Online-Library</h1>
	
<div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h5 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
          Show all books
        </button>
      </h5>
    </div>

    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
        <?php
        	$objQuery = Books::showBooks();
        	$i = 0;
        	while($totalRow=$objQuery->fetch()) {
        		$allBooks[$i]['book_id']=$totalRow['book_id'];
                $allBooks[$i]['book_name']=$totalRow['book_name'];
                $allBooks[$i]['book_author']=$totalRow['book_author'];
                $allBooks[$i]['book_year']=$totalRow['book_year'];
                $i++;     
            }
            foreach ($allBooks as $_book) {
            	echo "id-number: " . $_book['book_id'] . "<br>";
            	echo "Book: " . $_book['book_name'] . "<br>";
            	echo "Author: " . $_book['book_author'] . "<br>";
            	echo "The year of publishing: " . $_book['book_year'] . "<br><br>";
            }
        ?>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Add new book to Library
        </button>
      </h5>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
		<form method="POST" action="#">
		  <div class="form-group">
		    <label for="book_id">Book's id</label>
		    <input type="text" name="book_id" id="book_id" class="form-control" placeholder="book's id">
		  </div>			
		  <div class="form-group">
		    <label for="book_name">Book's name</label>
		    <input type="text" name="book_name" id="book_name" class="form-control" placeholder="book's name">
		  </div>
		  <div class="form-group">
		    <label for="book_author">Book's author</label>
		    <input type="text" name="book_author" id="book_author" class="form-control" placeholder="book's author">
		  </div>
		  <div class="form-group">
		    <label for="book_year">The year of publishing</label>
		    <input type="text" name="book_year" id="book_year" class="form-control" placeholder="book's year">
		  </div>
	<!-- 	  <input type="hidden" name="token" value="<?php echo(rand(10000,99999));?>" />	 -->	  
		  <button type="submit" name="addBook" class="btn btn-primary">Submit</button>
		</form>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h5 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Edit book
        </button>
      </h5>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
		<form method="POST" action="#">
		  <div class="form-group">
		    <label for="book_id">Book's id</label>
		    <input type="text" name="book_id" id="book_id" class="form-control" placeholder="book's id" required="">
		  </div>			
		  <div class="form-group">
		    <label for="book_name">Book's name</label>
		    <input type="text" name="book_name" id="book_name" class="form-control" placeholder="book's name">
		  </div>
		  <div class="form-group">
		    <label for="book_author">Book's author</label>
		    <input type="text" name="book_author" id="book_author" class="form-control" placeholder="book's author">
		  </div>
		  <div class="form-group">
		    <label for="book_year">The year of publishing</label>
		    <input type="text" name="book_year" id="book_year" class="form-control" placeholder="book's year">
		  </div>	  
		  <button type="submit" name="editBook" class="btn btn-primary">Submit</button>
		</form>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingFour">
      <h5 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
          Delete a book from Library
        </button>
      </h5>
    </div>

    <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
      <div class="card-body">
		<form method="POST" action="#">
		  <div class="form-group">
		    <label for="book_num">Enter book's ID</label>
		    <input type="text" name="book_num" class="form-control" id="book_num" placeholder="Enter book's id">
		  </div>
<!-- 		  <input type="hidden" name="token" value="<?php echo(rand(10000,99999));?>" />	 -->
		  <button type="submit" name="delete_book" class="btn btn-primary">Submit</button>
		</form>
      </div>
    </div>
  </div> 
  <div class="card">
    <div class="card-header" id="headingFive">
      <h5 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
          Search a book in Library
        </button>
      </h5>
    </div>

    <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
      <div class="card-body">
<form method="POST" action="#">
  <div class="form-group">
    <label for="selectParameter">Select parameter for searching</label>
    <select class="form-control" name="parameters" id="selectParameter">
      <option value="book_id">Book's id</option>
      <option value="book_name">Book's name</option>
      <option value="book_author">Book's author</option>
      <option value="book_year">The year of publishing</option>
    </select>
  </div>	
  <div class="form-group">
    <label for="valueParam">Parameter's value</label>
    <input type="text" name="value_param" class="form-control" id="valueParam" placeholder="write parameter's value">
  </div>
  <button type="submit" name="search_book" class="btn btn-primary">Submit</button>
</form>
      </div>
    </div>
  </div>   
</div>

<?php
if(isset($_POST['addBook'])) {
	// if ($_POST['token'] == $_SESSION['lastToken'])
	// {
 //    	echo "This form was sended!";
	// }
	// else
	// {
		$result = Books::searchBook('book_id', $_POST['book_id']);
		$row = $result->fetch();
		if ($row) {
			echo "A book with that id already exists!";
		} else {	
		    $bookId = $_POST['book_id'];
			$bookName = $_POST['book_name'];
			$bookAuthor = $_POST['book_author'];
			$bookYear = $_POST['book_year'];

			$book = new Books($bookId, $bookName, $bookAuthor, $bookYear);
			$book->addBook();
			echo "The book was added!";
		}
	// }
}

if (isset($_POST['delete_book'])) {

	$bookId = $_POST['book_num'];
	$result = Books::searchBook('book_id', $bookId);
	$row = $result->fetch();
	Books::deleteBook($bookId);
	if (!$row) {
		echo "No such the book in Library!";
	} else {
		echo "The book was deleted!";
	}	
}

	if (isset($_POST['search_book'])) {
		$parameter = $_POST['parameters'];
		$value = $_POST['value_param'];
		$result = Books::searchBook($parameter, $value);
        	$i = 0;
        	while($row=$result->fetch()) {
        		$books[$i]['book_id'] = $row['book_id'];
                $books[$i]['book_name'] = $row['book_name'];
                $books[$i]['book_author'] = $row['book_author'];
                $books[$i]['book_year'] = $row['book_year'];
                $i++;     
            }
            if (!empty($books)){
	            foreach ($books as $book) {
	            	echo "id-number: " . $book['book_id'] . "<br>";
	            	echo "Book: " . $book['book_name'] . "<br>";
	            	echo "Author: " . $book['book_author'] . "<br>";
	            	echo "The year of publishing: " . $book['book_year'] . "<br><br>";
	            }
            } else {
            	echo "No such the book in Library!";
            }
	}


if (isset($_POST['editBook'])) {
	$bookId = $_POST['book_id'];
	$result = Books::searchBook('book_id', $bookId);
	$row = $result->fetch();
	if (!$row) {
		echo "No such the book in Library!";
	} else {
		$string = '';
		foreach ($_POST as $key => $value) {
			if ($value) {
				$string .= "$key = '$value', ";
			}
		}
		$substr = substr($string, 0, strlen($string) - 2);
		Books::editBook($_POST['book_id'], $substr);
		echo "The book was editing!";
	}
}

?>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>