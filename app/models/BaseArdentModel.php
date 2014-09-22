<?php


class BaseArdentModel extends Ardent {
    protected $guarded = array();  // Important

    //Ardent configs
    public $autoHydrateEntityFromInput = true;
    public $autoPurgeRedundantAttributes = true;
    public $autoHashPasswordAttributes = true;

} 