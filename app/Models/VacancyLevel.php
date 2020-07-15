<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Model;

class VacancyLevel
{
    private $remainingCount;

    public function __construct(int $remainingCount) {
        $this->remainingCount = $remainingCount;
    }
    public function mark():string {
        $marks = ['empty' => '×', 'few' => '△', 'enough' => '◎'];
        $slug = $this->slug();
        assert(isset($marks[$slug]), new \DomainException('invalid slug value.'));
        return $marks[$slug];
    }

    // public function mark(): string {
    //     if($this->remainingCount === 0 ) {
    //         return '×';
    //     }
    //     if($this->remainingCount < 5 ) {
    //         return '△';
    //     }
    //     return '◎';
    // }
    public function slug(): string {
        if($this->remainingCount === 0) {
            return 'empty';
        }
        if($this->remainingCount < 5) {
            return 'few';
        }
        return 'enough';
    }
    // マジックメソッド
    public function __toString() {
        return $this->mark();
    }

    // public function mark(): string {
    //     if($this->remainingCount === 0 ) {
    //         return '×';
    //     }
    //     if($this->remainingCount === 4 ) {
    //         return '△';
    //     }
    //     if($this->remainingCount === 5 ) {
    //         return '◎';
    //     }
    // }
}
