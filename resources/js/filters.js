import Vue from 'vue';

Vue.filter('temperature', function(value, units='metric', digits=2){

    if (isNaN(value) || value === Infinity)
        return 'Не число';

    switch (units) {
        case 'metric':
            return (value - 273.15).toFixed(digits) + ' °C';
        case 'imperial':
            return ((value - 273.15) * 9 / 5 + 32).toFixed(digits) + ' °F';
        default:
            return value.toFixed(digits) + ' °K';
    }
});