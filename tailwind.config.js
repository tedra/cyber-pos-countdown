module.exports = {
    theme: {
        colors: {
            black: '#000000',
            yellow: '#fcee09'
        },
        inset: {
            '0': 0,
            auto: 'auto',
            '1/2': '50%'

        },
        screens: {
            'sm': '640px',
            'md': '768px'
        }
    },
    //uncomment purge to get file size down
    purge: {
        enabled: true,
        content: [
            './_web/**/*.php'
        ],
    },
    variants: {},
    plugins: [],
}