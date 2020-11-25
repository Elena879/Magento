/**
 * grunt exec:lena_luma_en_us && grunt less:lena_luma_en_us && grunt watch
 * grunt exec:lena_luma_uk_ua && grunt less:lena_luma_uk_ua && grunt watch
 */
module.exports = {
    lena_luma_uk_ua: {
        area: 'frontend',
        name: 'Lena/luma',
        locale: 'uk_UA',
        files: [
            'css/styles-m',
            'css/styles-l'
        ],
        dsl: 'less'
    },
    lena_luma_en_us: {
        area: 'frontend',
        name: 'Lena/luma',
        locale: 'en_US',
        files: [
            'css/styles-m',
            'css/styles-l'
        ],
        dsl: 'less'
    },
};
