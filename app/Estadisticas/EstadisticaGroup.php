<?php

enum EstadisticaGroup: String {
    case Year = "GROUP BY YEAR(fecha)";
    case Month = "GROUP BY MONTH(fecha)";
    case Week = "GROUP BY WEEK(fecha)";
}