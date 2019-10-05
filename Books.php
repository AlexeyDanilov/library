<?php
class Books{
	private $bookId;
	private $bookName;
	private $bookAuthor;
	private $bookYear;

	public function __construct($bookId, $bookName, $bookAuthor, $bookYear)
	{
		$this->bookId = $bookId;
		$this->bookName = $bookName;
		$this->bookAuthor = $bookAuthor;
		$this->bookYear = $bookYear;
	}

	private function connectDB()
	{
        $dsn = "mysql:host=localhost;dbname=library";
        return new PDO($dsn, 'root', '',[PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
	}

	public static function showBooks()
	{
		$query = "SELECT * FROM books";
		$db = self::connectDB();
		return $db->query($query);
	}

	public function addBook()
	{
		$query = "INSERT INTO books (book_id, book_name, book_author, book_year) VALUES('$this->bookId', '$this->bookName', '$this->bookAuthor', '$this->bookYear')"; 
		$db = self::connectDB();
		return $db->query($query);
	}

	public static function deleteBook($bookId)
	{
		$query = "DELETE FROM books WHERE book_id = '$bookId'";
		$db = self::connectDB();
		return $db->query($query);
	}

	public static function editBook($bookId, string $parametersValues)
	{
		$query = "UPDATE books SET $parametersValues WHERE book_id = $bookId";
		$db = self::connectDB();
		return $db->query($query);		
	}

	public static function searchBook($parameter, $value)
	{
		$query = "SELECT * FROM books WHERE $parameter = '$value'";
		$db = self::connectDB();
		return $db->query($query);		
	}
}