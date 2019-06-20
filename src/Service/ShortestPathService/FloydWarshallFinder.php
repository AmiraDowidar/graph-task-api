<?php
namespace App\Service\ShortestPathService;

use App\Exception\Exception;
use App\Entity\GraphInterface;

class FloydWarshallFinder implements SPFinderInterface
{

  protected $graph;
  protected $startingVertex;
  protected $endingVertex;
  protected $paths;

  /**
   * Instantiates a new algorithm, requiring a graph to work with.
   *
   * @param GraphInterface $graph
   */
  public function __construct(GraphInterface $graph, $start, $end)
  {
      $this->graph = $graph;
      $this->startingVertex = $start;
      $this->endingVertex = $end;
      $this->paths = array();
  }

    public function solve() {

      //Time Complexity of Floyd–Warshall's Algorithm is O(v^3) ,
      //where V is the number of vertices in a graph. -- Too high :( not worth it

      // for(int $k = 1; $k <= n; $k++){
      //     for(int $i = 1; $i <= n; $i++){
      //         for(int $j = 1; $j <= n; $j++){
      //             $dist[$i][$j] = min( $dist[$i][$j], $dist[$i][$k] + $dist[$k][$j] );
      //         }
      //     }
      // }
  }
}
