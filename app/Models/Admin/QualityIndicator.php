<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class QualityIndicator extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function region()
    {
      return $this->belongsTo(Region::class);
    }

    public function district()
    {
      return $this->belongsTo(District::class);
    }

    public function matrix()
    {
      return $this->belongsTo(Matrix::class, 'array_id');
    }

    public function farmerContour()
    {
      return $this->belongsTo(FarmerContour::class);
    }

    public function farmer()
    {
      return $this->farmerContour()->with('farmer');
    }

    public static function findOrCreate($region_id, $district_id, $array_id, $farmer_contour_id, $year, $quality_indicator, $salinity, $groundwater, $mineralisation)
    {
        $obj = QualityIndicator::where(['region_id' => $region_id, 'district_id' => $district_id, 'array_id' => $array_id, 'farmer_contour_id' => $farmer_contour_id, 'year' => $year])->first();
        if ($obj == null){
          $obj = new QualityIndicator;
        }
        $obj->region_id = $region_id;
        $obj->district_id = $district_id;
        $obj->array_id = $array_id;
        $obj->farmer_contour_id = $farmer_contour_id;
        $obj->year = $year;
        $obj->quality_indicator = $quality_indicator;
        $obj->salinity = $salinity;
        $obj->groundwater = $groundwater;
        $obj->mineralisation = $mineralisation;
        $obj->save();
    }

//    public function filterFarmer()
//    {
//      $this->
//    }

    public static function getIndicators()
    {
      $response = QualityIndicator::with('region', 'district', 'matrix','farmerContour', 'farmer');
      $response = ContourHistory::filterResponse($response);
      return $response->paginate(50);
    }
}
