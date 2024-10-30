/* eslint-disable no-undef */
const path = require("path");
const MiniCssExtractPlugin = require("mini-css-extract-plugin");
const CssMinimizerPlugin = require("css-minimizer-webpack-plugin");
const CopyPlugin = require("copy-webpack-plugin");
const BrowserSyncPlugin = require("browser-sync-webpack-plugin");
const WatchExternalFilesPlugin = require("webpack-watch-files-plugin").default;
const config = require("./config");

module.exports = {
  entry: "./src/js/index.js",
  output: {
    filename: "index.js",
    path: path.resolve(__dirname, "dist"),
    clean: true,
  },
  mode: "development",
  module: {
    rules: [
      {
        test: /\.(sa|sc|c)ss$/,
        use: [
          MiniCssExtractPlugin.loader,
          { loader: "css-loader", options: { sourceMap: true } },
          {
            loader: "sass-loader",
            options: {
              sourceMap: true,
              implementation: require("sass"),
              sassOptions: {
                outputStyle: "compressed",
              },
            },
          },
          {
            loader: "postcss-loader",
            options: {
              sourceMap: true,
              postcssOptions: {
                plugins: [["postcss-preset-env"]],
              },
            },
          },
        ],
      },
      {
        test: /\.css$/i,
        use: ["style-loader", "css-loader"],
      },
      {
        test: /\.jsx?$/,
        exclude: /node_modules/,
        use: {
          loader: "babel-loader",
          options: {
            presets: ["@babel/preset-env"],
          },
        },
      },
    ],
  },
  optimization: {
    minimize: true,
    minimizer: [new CssMinimizerPlugin()],
  },
  plugins: [
    new MiniCssExtractPlugin({
      filename: "styles.min.css",
    }),
    new CopyPlugin({
      patterns: [
        { from: "./src/images", to: "images", noErrorOnMissing: true },
        { from: "./src/js/libs", to: "js/libs", noErrorOnMissing: true },
        { from: "./src/bootstrap", to: "css", noErrorOnMissing: true },
        { from: "./src/fonts", to: "fonts", noErrorOnMissing: true },
      ],
    }),
    new BrowserSyncPlugin({
      host: "localhost",
      port: 3000,
      proxy: config.localUrl,
    }),
    new WatchExternalFilesPlugin({
      files: ["./templates/**/*.twig", "./views/**/*.twig"],
    }),
  ],
};
