<?php
namespace App\Service\ShortestPathService;

use App\Exception\Exception;
use App\Entity\GraphInterface;

class BellmanFordFinder implements SPFinderInterface
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
  public function __construct(GraphInterface $graph, $start, $end) {
      $this->graph = $graph;
      $this->startingVertex = $start;
      $this->endingVertex = $end;
      $this->paths = array();
  }

  public function solve() {

// Time Complexity of Bellman Ford algorithm is relatively high O (V.E).


// vector <int> v [2000 + 10];
//    int dis [1000 + 10];
//
//    for(int i = 0; i < m + 2; i++){
//
//        v[i].clear();
//        dis[i] = 2e9;
//    }
//
//   for(int i = 0; i < m; i++){
//
//        scanf("%d%d%d", &from , &next , &weight);
//
//        v[i].push_back(from);
//        v[i].push_back(next);
//        v[i].push_back(weight);
//   }
//
//    dis[0] = 0;
//    for(int i = 0; i < n - 1; i++){
//        int j = 0;
//        while(v[j].size() != 0){
//
//            if(dis[ v[j][0]  ] + v[j][2] < dis[ v[j][1] ] ){
//                dis[ v[j][1] ] = dis[ v[j][0]  ] + v[j][2];
//            }
//            j++;
//        }
//    }
  }
}
