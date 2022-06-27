<?php
abstract class  Animanga {
    private $id;
    private $title;
    private $original_title;
    private $type;
    private $synopsis;
    private $note;
    private $genres;
    private $statuts;
    private $image;
    private $last_release;


	function __construct( 
	 $id, 
	 $title,
     $original_title,
     $type,
     $synopsis,
     $note,
     $genres,
     $statuts,
     $image,
     $last_release)
	{
		$this->id = $id;
		$this->title = $title;
		$this->original_title = $original_title;
		$this->type = $type;
		$this->synopsis = $synopsis;
		$this->note = $note;
		$this->genres = $genres;
		$this->statuts = $statuts;
		$this->image = $image;
		$this->last_release = $last_release;
	}

    public function getId(){
		return $this->id;
	}

	public function getTitle(){
		return $this->title;
	}

	public function getOriginal_title(){
		return $this->original_title;
	}

	public function getType(){
		return $this->type;
	}


	public function getSynopsis(){
		return $this->synopsis;
	}


	public function getNote(){
		return $this->note;
	}


	public function getGenres(){
		return $this->genres;
	}

	public function getStatuts(){
		return $this->statuts;
    }

	public function getImage(){
		return $this->image;
	}


	public function getLast_release(){
		return $this->last_release;
	}


}
?>