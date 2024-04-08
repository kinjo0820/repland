/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      backgroundImage: {
        'hero-pattern': "url('/images/top/iguana-3192772_1280.jpg')",
        'footer-texture': "url('/img/footer-texture.png')",
      },
      animation: {
        "kenburns-top": "kenburns-top 5s ease   both"
      },
      keyframes: {
        "kenburns-top": {
            "0%": {
                transform: "scale(1) translateY(0)",
                "transform-origin": "50% 16%"
            },
            to: {
                transform: "scale(1.25) translateY(-15px)",
                "transform-origin": "top"
            }
      }
    }
    },
  },
  plugins: [],
}

