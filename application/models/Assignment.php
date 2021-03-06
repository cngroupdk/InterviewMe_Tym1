<?php

/**
 * Trida reprezentujici prirazeny test
 *
 */
class Assignment extends My_Db_Table_Row {
	
	/**
     * Vrati instanci stavu
     *
     */
    public function getStatus() {
        return $this->findParentRow('Statuses');
    }
	
	/**
     * Vrati instanci tvurce testu
     *
     */
    public function getCreator() {
        return $this->findParentRow('Users');
    }
	
	/**
     * Vrati instanci testu - predlohy
     *
     */
    public function getTest() {
        return $this->findParentRow('Tests');
    }
    
    /**
     * Vrati rowset s odpovedmi uchazece
     *
     */
     public function getResponses() {
        return $this->findDependentRowset('Responses');
    }
}
	